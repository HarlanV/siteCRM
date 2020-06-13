<?php

namespace App\Http\Controllers;

use App\Http\Staffs\Client;
use App\Http\Requests\ClientsFormRequest;
use Illuminate\Http\Request;

/**
 * Nome de controlador é sempre no singular. Corrigir para ClientController
 * Lembrar de mudar o nome do arquivo também e depois disso rodar no terminal
 * o comando composer dump-auto
 */
class ClientsController extends Controller
{
    // Lista clients salvos
    /**
     * nome de função é em inglês
     */
    function clientes(Request $request)
    {   
        /**
         * Nome de função é em inglês.
         * É realmente necessário uma model chamada Client?
         * Um cliente é um usuário do seu projeto, aconselho a utilizar a model User e não Client.
         */
        Client::listarClientes($request);
    }
    
    // Criaçã de novo cliente
    public function create()
    {
        /**
         * neste caso a blade create retorna apenas uma view de visualização dos clientes.
         * Considere modificar seu código para o seguinte.
         * return view('clients.create'); -> lembrando que o nome dos arquivos também são em inglês
         * considere modificar clientes para clients
         */
        echo view('clientes.create');
    }

    // Armazenamento de clientes.
    public function store(ClientsFormRequest $request)
    {
        /**
         * Esse método está mostrando um erro pq vc passou um ClientFormRequest ao invés
         * de um Request, considere modificar o que a função está esperando receber, ou seja,
         * ao invés da função esperar receber um \Illuminate\Http\Request ela esperarará receber
         * um \Illuminate\Http\ClientFormRequest.
         */
        Client::storeClient($request);      
        return redirect()->route('list_clients');
    }
    
    // Aqui deixarei um exemplo de como um comentário em um controller deve ser feito.
    
    // Deleta cliente existente

    /**
     * Método responsável por deletar um usuário no banco de dados.
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  \Illuminate\Http\ResponseRedirect
     */
    public function destroy(Request $request)
    {
        Client::deleteClient($request);
        return redirect()->route('list_clients'); 
    }

}
