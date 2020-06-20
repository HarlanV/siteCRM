<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientContact;

class ContactController extends Controller
{

    /**
     * Método exibe lista de clientes cadastrados
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    function clients(Request $request)
    {   


    }
    
    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   null
     * @return  \Illuminate\View\View
     */
    public function newContact()
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
     * @return  \Illuminate\View\View
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
     * @return  \Illuminate\View\View
     */
    public function clientRegister(int $clientId)
    {

        
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
     * Será editado ainda devido a reformulação do BD. Funcionando até18/06
     * 
     * 
     * @param int $id
     * @param int $id_register
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function clientEditForm(int $id, int $id_register, Request $request)
    {
        $client = ClientModel::find($id);

        $register = ClientRegister::find($id_register);

        $contacts = $register->contacts;
        
        $viewOnly = true;

        $form = 'clients.edit';

        $contactsCounts = $register->contacts->count();
        return view('clients.clientSection',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }


}

