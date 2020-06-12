<?php

namespace App\Http\Controllers;

use App\Http\Models\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    // Lista membros salvos
    function membros(Request $request)
    {   
        Member::listarMembros($request);
    }
    
    // Criaçã de novo membro
    public function create()
    {
        echo view('membros.create');
    }

    // Armazenamento de membros.
    public function store(Request $request)
    {
        Member::storeMember($request);        
        return redirect('/membro');
    }

    // Deleta membro existente
    public function destroy(Request $request)
    {
        Member::deleteMember($request);
        return redirect('/membro');    
    }

}
