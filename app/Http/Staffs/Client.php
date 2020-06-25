<?php

namespace App\Http\Staffs;

use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\services\ClientEditor;
use App\services\ClientCreator;
use App\services\ClientDeleter;
use App\services\RegisterCreator;
use App\services\RegisterDeleter;

class Client
{

    /**
     * Função para criar lista de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function listClients(Request $request)
    {
        $clients = ClientModel::query()->orderBy('name')->get();

        $mensagem = $request->session()->get('mensagem');

        echo view('clients.clients', compact('clients','mensagem'));
    }

    /**
     * Armazena clientes no banco de dados
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function storeClient(Request $request)
    {
        
        $clientCreator = new ClientCreator;
        $client = $clientCreator->clientCreate($request);
        $request->session()->flash('mensagem',"Cliente {$client} e seus contatos inserido com sucesso");
    }

    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function deleteClient(Request $request)
    {
        $deleter = new ClientDeleter;
        $clientId = $request->id;
        $deletedClient = $deleter->clientDelete($clientId);
        $request->session()->flash('mensagem',"O Cliente {$deletedClient} foi excluido com sucesso");

    }

    /**
     * Metodo para realizar a edição de clientes
     * 
     * @param   int    $request
     * @param   int    $request
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function editClient(int $id, int $id_Register, Request $request)
    {

        $clientEditor = new ClientEditor;
        $editedClient = $clientEditor->clientEdite($id,$id_Register, $request);
//        $request->session()->flash('mensagem',"O Cliente {$editedClient} foi editado com sucesso");   
$request->session()->flash('mensagem',"O setor '{$request->sector}' foi editado com sucesso");  
    }

    /**
     * Função para 
     * 
     * @param   int $id
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function storeRegister(int $id, Request $request)
    {
        $registerCreator = new RegisterCreator;
        $client = $registerCreator->createRegister($id, $request);
        $request->session()->flash('mensagem',"O setor {$request->sector} foi inserido com sucesso");
    }

    public static function deleteRegister(int $id, int $register_Id,Request $request)
    {
        $registers =ClientModel::find($id)->clientRegisters;
        $register = $registers->find($register_Id);
        $deleter = new RegisterDeleter;
        $deletedRegister = $deleter->deleteRegister($register);
        $request->session()->flash('mensagem',"O registro $deletedRegister foi excluido com sucesso");

    }
    
}
