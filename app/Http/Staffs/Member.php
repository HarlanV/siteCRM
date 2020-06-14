<?php


namespace App\Http\Staffs;

use App\Member as Member_model;
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
        // Mensagem: "membro __ adicionado com sucesso"
        $mensagem = $request->session()->get('mensagem');
        // retorna lista//

        echo view('members.members', compact('members','mensagem'));
    }

    /**
     * Metodo para armazenagem membros no banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function storeMember(Request $request)
    {
        $membro= Member_model::create( $request->all());
        $membro->save();
        // mensagem de confirmação. Iniciando seção.
        $request->session()->flash('mensagem',"Membro {$membro->name} inserido com sucesso");
    }

    /**
     * Metodo de deleção de membro do banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function deleteMember(Request $request){
        
        Member_model::destroy($request->id);
        $request->session()->flash('mensagem',"O membro foi excluido com sucesso");
    }
}
