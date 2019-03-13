<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');  
    }

    
     public function showLoginForm()
    {
       // dd('hi');

        return view('auth.admin-loginform');
    }

    public function submitLoginForm(Request $request)
    {

       // dd('hi');
       // dd($request);
        $this->validate($request,[  

            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
        {

            //dd('hi');

            return redirect()->intended(route('admindashboard'));
        }
        return redirect()->back()->withInput($request->only('email','remember'));
    }
}

?>