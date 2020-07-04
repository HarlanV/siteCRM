<?php
namespace App\services;

use App\Role;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginData
{

    public static function data(Request $request)
    {
  
        $member = Member::find($request->id);
        
        $data = [
            'email'=> $member->MemberContacts->primaryEmail,

            'password'=>$request->password,

            'name'=> $member->name,
            
            'type'=> $member->role->roleName,
        ];

        return $data;
    }

}