<?php

use App\Role;
use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::query()->first();

        $member = $role->members()->create([
            'name' => 'Davi',
        ]);

        $member->memberDocuments()->create([
            'cpf'=> '123456789',            
        ]);

        $member->memberContacts()->create([
            'primaryEmail' => 'presidencia@exemplo.com.br',
        ]);
    }
}

