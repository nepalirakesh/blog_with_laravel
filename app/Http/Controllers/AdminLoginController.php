<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;



class AdminLoginController extends Controller
{


//    public function __construct()
//    {
//        $this->middleware('guest:admin');
//    }
//
//    public function getLoginForm(){
//        return view('auth.admin_login');
//    }
//
//    public function login(Request $request){
//
//        $this->validate($request,[
//            'email'=>'required',
//            'password'=>'required',
//        ]);
//
//        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
//           return redirect()->intended(route('pages.admin_dashboard'));
//        }
//        return redirect()->back()->withInput($request->only('email','remember'));
//
//    }


    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    public function login(Request $request)
    {


        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            
            return redirect()->intended(route('admin_home'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }
}
