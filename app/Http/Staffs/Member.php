<?php


namespace App\Http\Staffs;

use App\Modelos\Membro;
use Illuminate\Http\Request;

class Member
{
// Atributos a serem inseridos. (pendente e devem ser realocados)
    /*
        private $Id;
        private $login;
        private $password;
        private $name;
        private $role; // cargo
        private $documents;
    */
        /**
         * @OneToMany(targetEntity="ClientPhone")
         */
    //    private $phone;   
        /**
         * Email de contato
         * @columns(type="string")
         */
    //    private $primaryEmail;      
        /**
         * Email de contato
         * @columns(type="string")
         */
    //    private $secondaryEmail;
        // pesquisa de membros

// Methods
    public static function listarMembros(Request $request)
    {
        // consulta e ordena por ordem alfabetica
        $members = Membro::query()->orderBy('nome')->get();
        // Mensagem: "membro __ adicionado com sucesso"
        $mensagem = $request->session()->get('mensagem');
        // retorna lista
        echo view('membros.membros', compact('members','mensagem'));
    }
    // Criaçã de novo membro
    public function create()
    {
        echo view('membros.create');
    }

    // Armazena membros
    public static function storeMember(Request $request)
    {
        $membro= Membro::create( $request->all());
        $membro->save();
        // mensagem de confirmação. Iniciando seção.
        $request->session()->flash('mensagem',"Membro {$membro->nome} inserido com sucesso");
    }

    public static function deleteMember(Request $request){
        
        Membro::destroy($request->id);
        $request->session()->flash('mensagem',"O membro foi excluido com sucesso");

    }
}
