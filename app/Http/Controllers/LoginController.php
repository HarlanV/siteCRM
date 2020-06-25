<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    public function acessForm()
    {
        return view('login.login');

    }

    public function login(Request $request)
    {
        if(!Auth::attempt([
        'email' => $request->email,
        'password' => $request->password])){
            return redirect()
            ->back()
            ->withErrors('Usuario e/ou senha incorreto(s)');
        }
        Auth::user();
    }
    
    public function logout()
    {

    }

}
