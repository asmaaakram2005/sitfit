<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }

    public function store(Request $request){
        $request->validate([
            "name"=>["required","string","min:3"],
            "email"=>["required","email", 'unique:users,email'],
            "phone"=>["required","string", "unique:users,phone"],
            "password"=>["required","string","min:8", "confirmed"],
        ]) ;
        $user = User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "phone"=> $request->phone,
            "password"=> $request->password,
            ]);

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success','Account created successfully');
    
    }
}
