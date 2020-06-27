<?php

namespace App\Http\Staffs;

use App\services\RoleCreator;
use App\services\RoleDeleter;
use Illuminate\Http\Request;

class Role
{

    /**
     * Função para gerar e exibir lista de cargos
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function listRole(Request $request)
    {
       
    }

    /**
     * Persistencia de cargos no banco de dados
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function storeRole(Request $request)
    {
        $roleCreator = new RoleCreator;
        $role = $roleCreator->roleCreate($request);
        $request->session()->flash('mensagem',"Cargo {$role} inserido com sucesso");
    }

    public static function deleteRole(Request $request)
    {
        $deleter = new RoleDeleter;
        $roleId = $request->id;
        $deleted = $deleter->roleDelete($roleId);
        $request->session()->flash('mensagem',"O Cliente {$deleted} foi excluido com sucesso");

    }

}
