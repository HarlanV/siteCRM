<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Member;
use App\Http\Requests\MembersFormRequest;
use App\Http\Staffs\Role;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Metodos exibe lista de membros cadastados
     * 
     * @param   Illuminate\Http\Request 
     */
    function index(Request $request)
    {   

        $members = Member::listMembers($request);

        $mensagem = $request->session()->get('mensagem');

        return view('members.members', compact('members','mensagem'));
       
    }
    
    /**
     * Metodo direciona ao fomulário para inserir membros
     * 
     * @return  view\membro\create
     */
    public function create()
    {
        $roles = Role::listRoles();
        $form = 'members.create';
        return view('members.form', compact('form','roles'));
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
    public function internService()
    {
        return view('members.index'); 
    }

    public function editForm(Request $request)
    {   
        Member::editableForm($request);
        
    }

    public function edit(Request $request)
    {
        Member::edit($request);
        return redirect()->route('list_members', array('id'=>$request->id)); 
    }


}
