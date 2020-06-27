<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Role;
use App\Role as AppRole;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Exibe a lista de cargos ja cadastrados
     * 
     * 
     */
    public function roleList(Request $request)
    {
        $roles = AppRole::query()->orderBy('roleName')->get();

        $mensagem = $request->session()->get('mensagem');

        echo view('roles.index', compact('roles','mensagem'));
    }

    /**
     * Direciona para o formulario para criar cargo
     * 
     * 
     */
    public function create()
    {
        $form = 'roles.create';
        $viewOnly=false;
        return view('roles.form',compact('form','viewOnly'));
        
    }

    public function store(Request $request)
    {

        Role::storeRole($request);      
        return redirect()->route('list_roles');
    }

    public function destroy(Request $request)
    {
        Role::deleteRole($request);
        return redirect()->route('list_roles'); 
    }

    public function edit()
    {
        
    }



}
