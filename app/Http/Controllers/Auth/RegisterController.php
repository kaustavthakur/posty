<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // dd($request->input('name'));
        // validation
        $this->validate($request, [
            'name' => 'required|max:60',
            'username' =>  'required|alpha_dash|max:60',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        // store user data
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        // sign in the user
        Auth::attempt($request->only('email', 'password'));
        // redirect
        return redirect()->route('dashboard');
    }
}
