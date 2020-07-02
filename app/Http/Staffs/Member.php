<?php


namespace App\Http\Staffs;

use App\Member as Member_model;
use App\services\MemberCreator;
use App\services\MemberDeleter;
use App\services\MemberEditor;
use Illuminate\Http\Request;

class Member
{
    /**
     * Método de exibição da listagem de membros já inseridos
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function listMembers()
    {
        $members = Member_model::query()->orderBy('name')->get();
        return $members;
    }

    /**
     * Metodo para armazenagem membros no banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function storeMember(Request $request)
    {
        $creator = new MemberCreator;
        
        $member = $creator->createMember($request);
        
        $request->session()->flash('mensagem',"Membro {$member} inserido com sucesso");
    }

    /**
     * Metodo de deleção de membro do banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function deleteMember(Request $request){
        
        $deleter = new MemberDeleter;

        $deleted = $deleter->memberDelete($request->id);

        $request->session()->flash('mensagem',"O membro {$deleted} foi excluido com sucesso");
        
    }

    public static function editableForm($request)
    {
        $member = Member_model::find($request->id);

        $documents = $member->MemberDocuments;

        $contacts = $member->MemberContacts;

        $roles = Role::listRoles();

        $viewOnly = false;

        $form = 'members.create';

        echo view('members.form',compact('member','documents','contacts','form','viewOnly','roles'));
    }

    public static function edit($request)
    {
        $editor = new MemberEditor;

        $editedClient = $editor->editMember($request->id, $request);

        $request->session()->flash('mensagem',"Informações do membro '{$request->sector}' do cliente {$editedClient} alteradas com sucesso");  

    }
}
