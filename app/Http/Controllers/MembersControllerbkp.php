<?php


namespace App\Http\Controllers;

use App\Http\Entidades\Membro;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // pesquisa de membros
    function membros(Request $request)
    {
        // consulta e ordena por ordem alfabetica
        $members = Membro::query()->orderBy('nome')->get();

        // view
        echo view('membros.membros', compact('members'));
    }
    // criaçã de novo membro
    public function create()
    {
        echo view('membros.create');
    }

    // Armazenamento de membros.
    public function store(Request $request)
    {
        $nome = $request->nome;
        // cria Membro a partir do tipo Model
        $membro= Membro::create( $request->all());
        $membro->save(); 
        
        return redirect('/membro');
    }
}
