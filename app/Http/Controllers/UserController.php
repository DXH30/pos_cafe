<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request) {
        if ($request->isMethod('POST')) {
            if ( Auth::attempt($request->only(['email', 'password'])) ) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('login')->withErrors(['msg' => 'Email atau password salah']);
            }
        } else {
            $obj = array(
                'title' => "Login"
            );
            return view('auth.login', $obj);
        }
    }

    public function register(Request $request) {
        if ($request->isMethod('POST')) {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('login');
        } else {
            $obj = array(
                'title' => "Register"
            );
            return view('auth.register', $obj);
        }
    }

    // TODO
    public function forgot_password(Request $request) {
        if ($request->isMethod('post')) {
        } else {
            $obj = array(
                'title' => "Forgot Password"
            );
            return view('auth.forgot_password', $obj);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->route('landing')->with('success', 'Logout success');
    } 
}
