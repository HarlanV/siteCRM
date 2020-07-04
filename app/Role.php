<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;
use App\services\RoleCreator;
use App\services\RoleDeleter;
use Illuminate\Http\Request;

class Role extends Model
{ 
    public $timestamps = false;
    protected $fillable = [
        'roleName',
        'director',
        'viewClient',
        'editClient',
        'editMember',
        'viewMember',
        'createLogin',
    ];

    /**
     * Metodo de relacionamento 1:n com membros
     *  
     * @param    null
     * @return   \App\MemberPhone
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    /**
     * Função para gerar e exibir lista de cargos
     * 
     * @param   \Illuminate\Http\request $request
     * @return  \App\Role   $roles
     */
    public static function listRoles()
    {
        $roles = self::query()->orderBy('roleName')->get();
        return $roles;
       
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
