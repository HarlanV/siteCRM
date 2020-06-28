<?php

namespace App\Http\Staffs;

use App\ClientRegister;
use Illuminate\Http\Request;
use App\Client as ClientModel;
use App\services\RegisterCreator;
use App\services\RegisterDeleter;

class Register
{

    /**
     * Função para listar os registros de cada cliente
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function list(Request $request)
    {
        $registers = ClientModel::find($request->id)->clientRegisters;

        $name = ClientModel::find($request->id)->name;

        $mensagem = $request->session()->get('mensagem');

        echo view('registers.registers',compact('registers','name','clientId','mensagem'));  
   
    }
    
    /**
     * Função para armazenar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function store(Request $request)
    {
        $registerCreator = new RegisterCreator;

        $client = $registerCreator->createRegister($request);

        $request->session()->flash('mensagem',"O setor {$request->sector} foi inserido com sucesso");
  
    }

    /**
     * Função para deletar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function delete(Request $request)
    {
        $registers =ClientModel::find($request->id)->clientRegisters;

        $register = $registers->find($request->register_Id);

        $deleter = new RegisterDeleter;

        $deletedRegister = $deleter->deleteRegister($register);

        $request->session()->flash('mensagem',"O registro $deletedRegister foi excluido com sucesso");

    }

    /**
     * Função para armazenar registro de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function editableForm(Request $request)
    {
        $client = ClientModel::find($request->id);

        $register = ClientRegister::find($request->id_register);

        $contacts = $register->clientContacts;
        
        $viewOnly = false;

        $form = 'clients.edit';

        $contactsCounts = $contacts->count();

        echo view('clients.editRegisterForm',compact('client','register','contacts','form','contactsCounts','viewOnly'));
    }


    
}
