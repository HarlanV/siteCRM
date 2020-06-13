<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
use App\Http\Requests\ClientsFormRequest;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    // Lista clients salvos
    function clientes(Request $request)
    {   
        Client::listarClientes($request);
    }
    
    // Criaçã de novo cliente
    public function create()
    {
        echo view('clientes.create');
    }

    // Armazenamento de clientes.
    public function store(ClientsFormRequest $request)
    {
        Client::storeClient($request);      
        return redirect()->route('list_clients');
    }

    // Deleta cliente existente
    public function destroy(Request $request)
    {
        Client::deleteClient($request);
        return redirect()->route('list_clients'); 
    }

}
