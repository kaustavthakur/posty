<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    //
    public function logout()
    {
        // auth()->logout();
        Auth::logout(); //same as above commented line
        return redirect()->route('posts');
    }
}
