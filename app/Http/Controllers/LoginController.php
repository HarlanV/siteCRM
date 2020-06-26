<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Redireciona para tela de login
     * 
     */
    public function acessForm()
    {
        return view('login.login');

    }

    /**
     * Metodo de login de Clientes. Deve ser editado para Membros no futuro [pendente!]
     * 
     * @param   \Illuminate\Http\Client\Request
     * @return 
     */
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email','password'])))
        {
            return redirect()
            ->back()
            ->withErrors('Usuario e/ou senha incorreto(s)');
        }
        return redirect('/');
    }
    
    public function logout()
    {

    }

}
