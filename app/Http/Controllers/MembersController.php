<?php


namespace App\Http\Controllers;

use App\Http\Entidades\Membro;
use App\Http\Models\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // Lista membros salvos
    function membros(Request $request)
    {   
        // consulta e ordena por ordem alfabetica
        $members = Member::listarMembros($request);

        // view
//        echo view('membros.membros', compact('members'));
    }

    // Criaçã de novo membro
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
