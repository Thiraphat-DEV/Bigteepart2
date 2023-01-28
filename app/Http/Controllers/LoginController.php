<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');   
    // }
    public function index() {
        return view('admin.auth.login');
    }


    public function dashboard1() {
        return view('admin.dashboard');
    }
    public function login(Request $req) {
        $input = $req->all();

        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if(auth()->user()->is_admin == '1') {
                // return redirect()->route('admin.dashboard');
                return redirect()->view('admin.dashboard');
            }else {
                return redirect()->route('dashboard');
            }
        }
        else {
            return redirect()->route('login')->with('error', 'Email And Password is inValid');
        }
    }
}
