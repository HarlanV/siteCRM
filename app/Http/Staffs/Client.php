<?php

namespace App\Http\Staffs;

use App\ClientRegister;
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
    public static function list(Request $request)
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
    public static function store(Request $request)
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
    public static function delete(Request $request)
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
    public static function edit(Request $request)
    {
        $clientEditor = new ClientEditor;

        $editedClient = $clientEditor->clientEdite($request->id, $request->id_Register, $request);

        $request->session()->flash('mensagem',"O setor '{$request->sector}' do cliente {$editedClient} foi editado com sucesso");  
    }
    
    public static function editableForm(Request $request)
    {
        $client = ClientModel::find($request->id);

        $register = ClientRegister::find($request->id_register);

        $contacts = $register->clientContacts;
        
        $viewOnly = false;

        $form = 'clients.edit';

        $contactsCounts = $contacts->count();

        echo view('clients.editRegisterForm',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }

}
