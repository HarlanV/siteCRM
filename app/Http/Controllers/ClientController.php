<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
use App\Http\Requests\ClientsFormRequest;
use Illuminate\Http\Request;

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

}
