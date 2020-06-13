<?php

namespace App\Http\Controllers;

use App\Modelos\Cliente;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(int $contatoId)
    {
        $contatos = Cliente::find($contatoId)->contatos;
        echo "pausa neste ponto!";
        exit();
        return view('contatos.index',compact($contatos));
    }
}
