<?php

namespace App\Http\Controllers;

use App\ClientRegister;
use App\Http\Staffs\Client;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\Http\Requests\ClientsFormRequest;

class ClientController extends Controller
{    

public function __construct()
{
    $this->middleware('LoginDirector');
}

    /**
     * Método exibe lista de clientes cadastrados
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function clients(Request $request)
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
     * @return  \Illuminate\View\View
     */
    public function createClient()
    {
        $form = 'clients.create';
        $viewOnly=false;
        return view('clients.editRegisterForm',compact('form','viewOnly'));   
    }

    /**
     * Metodo de requisicao para inserir novos clientes no DB
     * 
     * @param   \App\Http\Requests\ClientsFormRequest    $request
     * @return  \Illuminate\Http\RedirectResponse
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
     * Metodo de requisicao de uma lista de contatos por setor
     * 
     * @param   int $clientId
     * @return  \Illuminate\View\View
     */
    public function clientRegister(int $clientId, Request $request)
    {
        $registers = ClientModel::find($clientId)->clientRegisters;
  
        $name = ClientModel::find($clientId)->name;
        $mensagem = $request->session()->get('mensagem');

        echo view('registers.registers',compact('registers','name','clientId','mensagem'));
    }

    /**
     * Edita/Corrige dados de clientes ja armazenados
     * 
     * @param   int $id
     * @param   int $id_register
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function clientEdit(int $id, int $id_register, ClientsFormRequest $request)
    {
     
        Client::editClient($id, $id_register, $request);
        return redirect()->route('list_registers', array('id'=>$id)); 
    }

    /**
     * Metodo retorna o formulario preenchido para ser alterado
     * 
     * @param   int $id
     * @param   int $id_register
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function clientEditForm(int $id, int $id_register, Request $request)
    {

        $client = ClientModel::find($id);

        $register = ClientRegister::find($id_register);

        $contacts = $register->clientContacts;
        
          //        $viewOnly = true;
        $viewOnly = false;

        $form = 'clients.edit';

        $contactsCounts = $contacts->count();
        return view('clients.editRegisterForm',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }

    /**
     * Metodo retorna formulario pronto para novo Registro
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function newRegisterForm(int $id, Request $request)
    {
        $client = ClientModel::find($id);
        $form = 'registers.addRegister';
        $viewOnly=false;
//        return view('registers.registerForm',compact('client','form','viewOnly'));
        return view('clients.editRegisterForm',compact('client','form','viewOnly'));
    }

    /**
     * Metodo para persistencia de novo registro em DB
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function storeRegister(int $id, Request $request)
    {
        Client::storeRegister($id, $request);      
        return redirect()->route('list_registers', array('id'=>$id));
    }

    /**
     * Metodo para deleção de registros do DB
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function registerDestroy(int $id, int $register_Id, Request $request)
    {
        Client::deleteRegister($id, $register_Id, $request);
        return redirect()->route('list_registers', array('id'=>$id)); 
    }

}
