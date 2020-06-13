<?php


namespace App\Http\Staffs;

use App\Modelos\Cliente;
use Illuminate\Http\Request;

class Client
{
// Methods
    public static function listarClientes(Request $request)
    {
        // consulta e ordena por ordem alfabetica
        $clients = Cliente::query()->orderBy('nome')->get();
        // Mensagem: "cliente __ adicionado com sucesso"
        $mensagem = $request->session()->get('mensagem');
        // retorna lista
        echo view('clientes.clientes', compact('clients','mensagem'));
    }
    // Criaçã de novo cliente
    public function create()
    {
        echo view('clientes.create');
    }

    // Armazena membros
    public static function storeClient(Request $request)
    {
        // Nomes dos clientes
        $cliente= Cliente::create(['nome'=>$request->nome]);

        // Adiciona o contato com o setor
        $setor = $request->setor_contato;
        $contato = $cliente->contatos()->create(['setor' =>$setor]);


        // Adiciona o telefone do setor à lista de telefones
        $telefone = $contato->telefones()->create(['telefone'=>$request->telefone]);
/*
        ?>
        <pre>
            <?php
                var_dump($contato);
            ?>
        </pre>
        <?php


        //echo "Até aqui ok";
        exit();
  */      

        $cliente->save();
        

        // mensagem de confirmação. Iniciando seção.
        $request->session()->flash('mensagem',"Cliente {$cliente->nome} e seus contatos inserido com sucesso");


    }

    public static function deleteClient(Request $request){
        
        Cliente::destroy($request->id);
        $request->session()->flash('mensagem',"O Cliente foi excluido com sucesso");

    }
}
