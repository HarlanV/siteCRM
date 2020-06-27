<?php
namespace App\services;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleCreator
{

    public function roleCreate(Request $request)
    {
  
        DB::beginTransaction();
        

            $role = Role::create([
                'roleName'=> $request->roleName,
                'director'=> (bool) $request->director,
                'viewClient'=> (bool) $request->viewClient,
                'editClient'=> (bool) $request->editClient,
                'editMember'=> (bool) $request->editMember,
                'viewMember'=> (bool) $request->viewMember,
                'createLogin'=> (bool) $request->createLogin
                ]);
            $role->save();
            $name = $role->roleName;
    
        DB::commit();   
        
        return $name;



    }

}