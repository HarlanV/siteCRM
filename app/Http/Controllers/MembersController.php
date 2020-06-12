<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Member;
use App\Http\Requests\MembersFormRequest;
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
    public function store(MembersFormRequest $request)
    {
        Member::storeMember($request);      
        return redirect()->route('list_members');
    }

    // Deleta membro existente
    public function destroy(Request $request)
    {
        Member::deleteMember($request);
        return redirect()->route('list_members'); 
    }

}
