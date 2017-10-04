<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');

    }
    public function login(Request $request){
       // validating the form data

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
            'job_title'=>'nullable'
        ]);
        //attempt to log the user in
        if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            // if successfull, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
        // if unsuccessfull, then redirect back to login with form data
        return redirect()->back()->withInput($request->only('email','remember'));

    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

//        $request->session()->invalidate();

        return redirect('/posts');
    }

}
