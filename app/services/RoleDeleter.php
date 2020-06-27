<?php
namespace App\services;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleDeleter
{
    public function roleDelete(int $roleId)
    {
        DB::beginTransaction();         
           
            $role = Role::find($roleId);
            $name = $role->roleName;
            // teste de verificação se ainda associado a algum membro
            $role->delete();

        DB::commit();

        return $name;
    }

}