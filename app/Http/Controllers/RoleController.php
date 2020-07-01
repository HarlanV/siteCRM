<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Exibe a lista de cargos ja cadastrados
     * 
     * 
     */
    public function index(Request $request)
    {
        $roles = Role::listRoles();

        $mensagem = $request->session()->get('mensagem');

        return view('roles.index', compact('roles','mensagem'));
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
