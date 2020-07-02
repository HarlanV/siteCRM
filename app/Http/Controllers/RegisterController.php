<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Member;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Esse controller já existe dentro da pasta Auth!!
class RegisterController extends Controller
{
    public function create()
    {
        $members = Member::listMembers();
        echo view('login.create',compact('members'));
       
    }

    public function store(Request $request)
    {
        $data = $request->except(('_token'));
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect()->route('/');
    }
}
