<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function showLoginRegistration()
    {
        return view('frontend.layouts.login-registration');
    }

    public function registration(Request $request)
    {

        $request->validate([
           'name'=>'required',
           'email'=>'email|required|unique:users',
            'password'=>'required|min:6'
        ]);

        User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password)
        ]);

        return redirect()->back()->with('success','User Registration Successful.');

    }

    public function login(Request $request)
    {
//        dd($request->all());
//validate input
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        //authenticate
        $credentials = $request->only('email', 'password');
//        dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('homepage');
        }
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.registration.form')->with('success','Logout Successful.');

    }
}
