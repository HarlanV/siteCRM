<?php


namespace App\Http\Staffs;

use Illuminate\Http\Request;
use App\Client as Client_model;
use App\services\ClientCreator;
use App\services\ClientDeleter;

class Client
{
// Methods

    /**
     * Função responsável por criar lista de clientes
     * @param   $App\Http\Requests\ClientsFormRequest
     * @return  $view [editar]
     */
    public static function listClients(Request $request)
    {
        $clients = Client_model::query()->orderBy('name')->get();

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
        
        $client = $clientCreator->clientCreate(
            $request->name,
            $request->sector,
            $request->phone);

        $request->session()->flash('mensagem',"Cliente {$client} e seus contatos inserido com sucesso");
    }

    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function deleteClient(Request $request){

        $deleter = new ClientDeleter;

        $clientId = $request->id;

        $deletedClient = $deleter->clientDelete($clientId);

        $request->session()->flash('mensagem',"O Cliente $deletedClient foi excluido com sucesso");

    }
}
