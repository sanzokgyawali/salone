<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cookie;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendemail;
class CustomerController extends Controller
{
    public function login()
    {
      return view("customer.login");
    }
    public function signup()
    {
      if(isset($_COOKIE['emails']) && isset($_COOKIE["passwords"]) && isset($_COOKIE["ward_id"]))
      {
        return redirect()->intended(url('customer/dashboard'));
      }
      else if(!isset($_COOKIE["ward_id"]) && isset($_COOKIE['emails']) && isset($_COOKIE['passwords']))
    {
  return redirect()->intended(url("/customer/signup2"));
    }else{
      return view("customer.signup");
    }
    }
    public function signupsubmit(Request $request)
    {
      $message=[
        'fname.required'=>'Please fill first name form',
        'lname.required'=>'Please fill last name form',
        'dname.required'=>'Please fill display name',
        'email.required'=>'Please fill email to continue',
        'email.email'=>'Type email in correct pattern',
        'phone.required'=>'Please fill phone',


      ];
      $request->validate([
        'fname'=>'required|max:50',
        'lname'=>'required|max:50',
        'email'=>'email|required',
        'phone'=>'required|max:10|min:9',
        'dname'=>'required',
        'password'=>'required'

      ],$message);
      $fname=$request->fname;
      $lname=$request->lname;
      $full=$fname." ".$lname;
      $email=$request->email;
      $phone="+977-".$request->phone;
      $dname=$request->dname;
      $street_name=" ";
      $password=bcrypt($request->password);
      $ward_id=null;
      $created_at=date('Y-m-d H:i:s');
      DB::insert("insert into customer_logins(cust_full_name,cust_display_name,cust_email,cust_phone,password,ward_id,created_at,street_name) values(?,?,?,?,?,?,?,?) ",[$full,$dname,$email,$phone,$password,$ward_id,$created_at,$street_name]);
      $id = DB::getPdo()->lastInsertId();
    //  Cookie::make('emails', $email, 360);
         setcookie("emails", $email, time() + (86400 * 30), "/");
        setcookie("passwords", $password, time() + (86400 * 30), "/");
        setcookie("ids", $id, time() + (86400 * 30), "/");

      return redirect()->intended(url("/customer/signup2"));
    }
    function signup2()
    {
      if(isset($_COOKIE['emails']) && isset($_COOKIE["passwords"]) && isset($_COOKIE["ward_id"]))
      {
        return redirect()->intended(url('customer/dashboard'));
      }else if(!isset($_COOKIE['emails']) && !isset($_COOKIE['passwords']))
      {
        return redirect()->intended(url('customer/signup'));
      }
    else{
      $res=DB::select("select * from state_names");

      return view('customer.signup2',['res'=>$res]);
    }}
    function district(Request $request)
    {
      $value=$request->get('value');
      $res=DB::select("select * from district_names where state_id=?",[$value]);
      $output='<option>Please select district</option>';
           foreach($res as $r)
           {
               $output.='<option value="'.$r->district_id.'">'.$r->district_name.'</option>';

           }
           echo $output;
    }
    function muncipality(Request $request)
    {
      $value=$request->get('value');
      $res=DB::select("select * from city_names where district_id=?",[$value]);
      $output='<option>Please select muncipality</option>';
           foreach($res as $r)
           {
               $output.='<option value="'.$r->mun_id.'">'.$r->muncipality_name.'</option>';

           }
           echo $output;
    }
    function ward(Request $request)
    {
      $value=$request->get('value');
      $res=DB::select("select * from ward_nos where mun_id=?",[$value]);
      $output='<option>Please select ward no</option>';
           foreach($res as $r)
           {
               $output.='<option value="'.$r->ward_id.'">'.$r->ward_no.'</option>';

           }
           echo $output;
    }
    function signups2(Request $request)
    {
      $request->validate([
        'street_name'=>'required',

      ]);
      if($request->ward_id=="Please select ward no")
      {
        Session::put("Please insert valid ward_no");
        return redirect()->back();
      }
      else {

        $ward_id=$request->ward_id;
        $id=$_COOKIE['ids'];
        $street_name=$request->street_name;
        DB::update("update customer_logins set ward_id=?, street_name=? where cust_id=?",[$ward_id,$id,$street_name]);
         setcookie("ward_id", $ward_id, time() + (86400 * 30), "/");
         $code=substr(str_shuffle("0123456789"), 0, 4);
         $email=$_COOKIE['emails'];
         //$subject="Enter a verification code to your barbar shop account";
         $message="Your verification code for barbar shop is    ".$code."go to your app and enter this code";
         Mail::to($email)->send(new sendemail($message));
         return redirect()->intended(url("customer/dashboard"));

      }
    }
}
