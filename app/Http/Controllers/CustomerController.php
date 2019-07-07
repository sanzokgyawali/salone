<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function login()
    {
      return view("customer.login");
    }
    public function signup()
    {
      return view("customer.signup");
    }
    public function signupsubmit(Request $request)
    {
      $message=[
        'fname.required'=>'Please fill first name form',
        'lname.required'=>'Please fill last name form',

      ];
      $request->validate([
        'fname'=>'required|max:50',
        'lname'=>'required|max:50',
        'email'=>'required|unique',
        'phone'=>'required|max:10|min:9'

      ],$message);
    }
}
