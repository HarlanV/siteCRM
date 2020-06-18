<?php


namespace App\Http\Staffs;

use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\ClientRegister;
use App\ClientContact;
use App\services\ClientCreator;
use App\services\ClientDeleter;

class Client
{
// Methods

    /**
     * Função responsável por criar lista de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function listClients(Request $request)
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
    public static function storeClient(Request $request)
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
    public static function deleteClient(Request $request){

        $deleter = new ClientDeleter;

        $clientId = $request->id;

        $deletedClient = $deleter->clientDelete($clientId);

        $request->session()->flash('mensagem',"O Cliente $deletedClient foi excluido com sucesso");

    }

    /**
     * Metodo de edição de clientes. Imcompleto ainda
     * 
     * @param   int    $request
     * @param   int    $request
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function editClient(int $id, int $id_Register, Request $request){

        echo "Staffs->Client->editClient. Metodo incompleto";
        exit();

        $client = ClientModel::find($id);
        $client->name = $request->name;

        $Register = ClientRegister::find($id_Register);
        $Register->Register = $request->Register;
        
        $newContacts = [$request->Contact,$request->secondaryContact];
        $i=0;
        ?><pre><?php
        foreach ($Register->Contacts as $Contact) {
            $Contact->Contact = $newContacts[$i];
            $i++;
        }
        
        
//        $ContactId = ($Register->Contacts[0]->id);
//        $Contact = ClientContact::find($ContactId);
        //$newName = 
        
//        $client->save();
    }
}
