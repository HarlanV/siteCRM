<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Member;
use App\Http\Requests\MembersFormRequest;
use App\Role;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Lista membros salvos

    /**
     * Metodos exibe lista de membros cadastados
     * 
     * @param   Illuminate\Http\Request 
     */
    function members(Request $request)
    {   
        //se esse método mostra a lista de membros ele deve se chamar index!
        Member::ListMembers($request);
    }
    
    /**
     * Metodo direciona ao fomulário para inserir membros
     * 
     * @return  view\membro\create
     */
    public function create()
    {
        // esse método deve se chamar create
        return view('members.create');
    }

    /**
     * Metodo para armazenar membros no banco Members
     * 
     * @param   \App\Http\Requests\MembersFormRequest
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function store(MembersFormRequest $request)
    {
        Member::storeMember($request);      
        return redirect()->route('list_members');
    }

    /**
     * Metodo de exxlusão de membros do banco de dados
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  \Illuminate\Routing\RedirectController
     */
    public function destroy(Request $request)
    {
        // também escrevemos o Forme Request para o método delete
        Member::deleteMember($request);
        return redirect()->route('list_members'); 
    }

    /**
     * Retorna a view de serviçoes internos. Temporario [pendente!]
     * 
     */
    public function internService(Request $request)
    {
        return view('members.index'); 
    }
}
