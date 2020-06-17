<?php

namespace App\Http\Controllers;

use App\ClientContact;
use App\ClientRegister;
use App\Http\Staffs\Client;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\Http\Requests\ClientsFormRequest;

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
        $form = 'clients.create';
        return view('clientForm',compact('form'));
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
    public function ClientRegister(int $clientId)
    {
        $register = ClientModel::find($clientId)->registers;
        $name = ClientModel::find($clientId)->name;

        return view('contacts.list',compact('sectors','name','clientId'));
    }

    /**
     * Metodo edita nome do membro na base de dados 
     * 
     * @param Illuminate\Http\Request $request
     */
    public function clientEdit(int $id, int $id_register, Request $request)
    {
        $cliente = Client::editClient($id, $id_register, $request);
    }

    /**
     * Metodo edita nome do membro na base de dados 
     * 
     * @param int $id
     * @param int $id_register
     * @param Illuminate\Http\Request $request
     */
    public function clientEditForm(int $id, int $id_register, Request $request)
    {
        $client = ClientModel::find($id);

        $register = ClientRegister::find($id_register);
        $contactId = ($sector->contacts[0]->id);
        $contact = ClientContact::find($contactId);
        $form = 'contacts.edit';
        return view('clientForm',compact('client','sector','contact','form'));
    }
}
