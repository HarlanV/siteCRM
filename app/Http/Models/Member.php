<?php


namespace App\Http\Models;

use App\Http\Entidades\Membro;
use Illuminate\Http\Request;

class Member
{

    private $Id;
    private $login;
    private $password;
    private $name;
    private $role; // cargo
    private $documents;
    /**
     * @OneToMany(targetEntity="ClientPhone")
     */
    private $phone;   
    /**
     * Email de contato
     * @columns(type="string")
     */
    private $primaryEmail;      
    /**
     * Email de contato
     * @columns(type="string")
     */
    private $secondaryEmail;

    // pesquisa de membros
    public static function listarMembros(Request $request)
    {
        // consulta e ordena por ordem alfabetica
        $members = Membro::query()->orderBy('nome')->get();
        // retorna lista
        echo view('membros.membros', compact('members'));
//        return($members);

    }
    // criaçã de novo membro
    public function create()
    {
        echo view('membros.create');
    }

    // Armazenamento de membros.
    public function store(Request $request)
    {
        $nome = $request->nome;
        // cria Membro a partir do tipo Model
        $membro= Membro::create( $request->all());
        $membro->save(); 
        
        return redirect('/membro');
    }
}
