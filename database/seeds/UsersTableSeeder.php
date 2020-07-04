<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type'=>'Admin',
            'name'=>'Harlan Victor',
            'email'=>'harlan.eq@gmail.com',
            'password'=>Hash::make('life2046')
        ]);
    }
}
