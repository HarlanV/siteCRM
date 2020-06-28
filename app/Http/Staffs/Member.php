<?php


namespace App\Http\Staffs;

use App\Member as Member_model;
use App\services\MemberCreator;
use App\services\MemberDeleter;
use Illuminate\Http\Request;

class Member
{
    /**
     * Método de exibição da listagem de membros já inseridos
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function listMembers(Request $request)
    {
        $members = Member_model::query()->orderBy('name')->get();
        $mensagem = $request->session()->get('mensagem');
        echo view('members.members', compact('members','mensagem'));
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
}
