<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $role = Role::create([
            'roleName'=> 'Presidente',
            'director'=> true,
            'viewClient'=> true,
            'editClient'=> true,
            'editMember'=> true,
            'viewMember'=> true,
            'createLogin'=> true
            ]);
    }
}
