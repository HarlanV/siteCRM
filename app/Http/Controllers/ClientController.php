<?php

namespace App\Http\Controllers;

use App\ClientRegister;
use App\Http\Staffs\Client;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\Http\Requests\ClientsFormRequest;
use App\Http\Staffs\Register;

class ClientController extends Controller
{    

    /**
     * Método exibe lista de clientes cadastrados
     * 
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function clients(Request $request)
    {   
        Client::list($request);
    }
    
    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   null
     * @return  \Illuminate\View\View
     */
    public function createClient()
    {
        // variavel de direcionamento para blade final
        $form = 'clients.create';

        // variavel auxiliar para remover botões de edição no form
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
        Client::store($request);      
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
        Client::delete($request);
        return redirect()->route('list_clients'); 
    }

    /**
     * Metodo de requisicao de uma lista de contatos por setor
     * 
     * @param   int $clientId
     * @return  \Illuminate\View\View
     */
    public function registers(Request $request)
    {
        Register::list($request);
    }

    /**
     * Edita/Corrige dados de clientes ja armazenados
     * 
     * @param   int $id
     * @param   int $id_register
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function clientEdit(ClientsFormRequest $request)
    {
        Client::edit($request);
        return redirect()->route('list_registers', array('id'=>$request->id)); 
    }

    /**
     * Metodo retorna o formulario preenchido para ser alterado
     * 
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function clientEditForm(Request $request)
    {
        Client::editableForm($request);
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
        // vc já tem um método que cria um cliente, qual a necessidade de outro?
        $client = ClientModel::find($id);
        $form = 'registers.addRegister';
        $viewOnly=false;
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
        Register::store($request); 

        return redirect()->route('list_registers', array('id'=>$request->id));

    }

    /**
     * Metodo para deleção de registros do DB
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\RedirectResponse
     */
    public function registerDestroy(Request $request)
    {
        Register::delete($request);
        return redirect()->route('list_registers', array('id'=>$request->id)); 
    }

    /**
     * Metodo retorna o formulario apenas para visualização
     * 
     * @param   int $id
     * @param   int $id_register
     * @param   \Illuminate\Http\Request $request
     * @return  \Illuminate\View\View
     */
    public function registerView(int $id, int $id_register, Request $request)
    {

        $client = ClientModel::find($id);

        $register = ClientRegister::find($id_register);

        $contacts = $register->clientContacts;
        
        $viewOnly = true;
 
        $form = 'clients.viewRegister';

        $contactsCounts = $contacts->count();
        
        return view('clients.editRegisterForm',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }

}
