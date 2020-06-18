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
    public function newClient()
    {
        
        $form = 'clients.create';
        //return view('clientForm',compact('form'));
        $viewOnly=false;
        return view('clients.clientSection',compact('form','viewOnly'));
        
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
     * @param   int $clientId
     * @return  \views\clients\create
     */
    public function clientRegister(int $clientId)
    {
        $registers = ClientModel::find($clientId)->registers;
        //        $registers = ClientModel::find($clientId)->registers;
       // $contacts = ClientModel::find($clientId)->register->contacts;
        $name = ClientModel::find($clientId)->name;

        return view('clients.listClients',compact('registers','name','clientId'));
//        return view('clients.listClients',compact('registers','name','clientId','contacts'));
    }

    /**
     * Metodo edita nome do membro na base de dados 
     * @param int $id
     * @param int $id_register
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function clientEdit(int $id, int $id_register, Request $request)
    {
        $cliente = Client::editClient($id, $id_register, $request);
    }

    /**
     * Metodo retorna o formulario preenchido para ser alterado [Pendente!]
     * Será editado ainda devido a reformulação do BD. Funcionando até 18/06
     * 
     * 
     * @param int $id
     * @param int $id_register
     * @param Illuminate\Http\Request $request
     */
    public function clientEditForm(int $id, int $id_register, Request $request)
    {
        $client = ClientModel::find($id);
        $register = ClientRegister::find($id_register);
        $contacts = $register->contacts;
        // Nome do contato  = ($contact)->correspondent
        

//        $contactId = ($register->contacts[1]->id);
//       $contact = ClientContact::find($contactId);

       
        $viewOnly = true;


        $form = 'clients.edit';
        $contactsCounts = $register->contacts->count();
        //return view('clients.clientSection',compact('client','register','contact','form','contactsCounts','viewOnly'));
        return view('clients.clientSection',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }
}
