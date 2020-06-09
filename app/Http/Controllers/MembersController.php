<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MembersController extends Controller
{
    function membros(Request $request){
        
        $members = [
            'Ricardo',
            'Jonas ',
            'Matheus'
        ];

        // print da pagina de visualização dos membros
        echo view('membros.membros', compact('members'));

    }

    function create(){
        echo view('membros.create');    
    }
}
