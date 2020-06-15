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
     * Método responsável por adicionar um usuário no banco de dados.
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
     * Método responsável por deletar um usuário do banco de dados.
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
     * Recebe e armazena os contatos de um novo cliente 
     * 
     * @param   int $contactId
     * @return  \views\clients\create
     */
    public function clientContact(int $clientId)
    {
        $sectors = ClientModel::find($clientId)->contacts;
        return view('contacts.list',compact('sectors'));
    }

    /**
     * Metodo e construção.
     * Problema: o método aparentemente é chamado na rota   
     * 
     * @param Illuminate\Http\Request $request
     */
    public function clientEdit(Request $request){


        // teste
        echo (var_dump($request));
        exit();
        //return redirect()->route('list_members');
        /*
        $newName = $request->id;
        $client = ClientModel::find($request->id);
        $client->name = $newName;
        $client->save();
        */
    }


}
