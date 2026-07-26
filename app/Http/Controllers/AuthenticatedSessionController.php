<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create(){
        return view("auth.login");
    }

    public function store(Request $request){
        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required', 'min:8'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {

            $request->session()->regenerate();
            return redirect()->intended(route('home'))->with('success','Account created successfully');
        }

            return back()->withErrors([
            'email' => 'Invalid email or password.',])->onlyInput('email');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home')->with('success', 'Logged out successfully.');
    }
}

