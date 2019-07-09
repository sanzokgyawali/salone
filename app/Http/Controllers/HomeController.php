<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
      if(isset($_COOKIE['emails']) && isset($_COOKIE["passwords"]) && isset($_COOKIE["ward_id"]))
      {
        return redirect()->intended(url('customer/dashboard'));
      }
      else if(!isset($_COOKIE["ward_id"]) && isset($_COOKIE['emails']) && isset($_COOKIE['passwords']))
    {
  return redirect()->intended(url("/customer/signup2"));
    }else{
      return view("index");
    }
    }
}
