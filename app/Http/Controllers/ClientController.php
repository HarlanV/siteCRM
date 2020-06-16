<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
use App\Http\Requests\ClientsFormRequest;
use Illuminate\Http\Request;
use App\Client as ClientModel;

class ClientController extends Controller
{    
    /**
     * Método exibe lista de clientes cadastrados
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    function clients(Request $request)
    {   
        /**
         * É realmente necessário uma model chamada Client? 
         * Um cliente é um usuário do seu projeto, aconselho a utilizar a model User e não Client.
         * [pendente de resolução]
         */
        Client::listClients($request);
    }
    
    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   null
     * @return  views\clients\create
     */
    public function list()
    {
        return view('clients.create');
    }

    /**
     * Metodo de requisicao para inserir novos clientes no DB
     * 
     * @param   \App\Http\Requests\ClientsFormRequest    $request
     * @return  \views\clients\create
     */
    public function store(ClientsFormRequest $request)
    {
        Client::storeClient($request);      
        return redirect()->route('list_clients');
    }

    /**
     * Metodo de requisicao para deletar cliente do DB
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  \Illuminate\Routing\RedirectController
     */
    public function destroy(Request $request)
    {
        Client::deleteClient($request);
        return redirect()->route('list_clients'); 
    }

    /**
     * Metodo de requisicao de uma lista de contatos[cliente]
     * 
     * @param   int $contactId
     * @return  \views\clients\create
     */
    public function clientContact(int $clientId)
    {
        $sectors = ClientModel::find($clientId)->contacts;
        $name = ClientModel::find($clientId)->name;

        return view('contacts.list',compact('sectors','name'));
    }

    /**
     * Metodo edita nome do membro na base de dados 
     * 
     * @param Illuminate\Http\Request $request
     */
    public function clientEdit(int $id, Request $request)
    {

        $cliente = Client::editClient($id, $request);
    }


}
