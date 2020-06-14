<?php

namespace App\Http\Controllers;

use App\Client;

class ContactController extends Controller
{

    /**
     * Recebe e armazena os contatos de um novo cliente 
     * 
     * @param   contactId
     * @return  views\clients\create
     */
    public function index(int $contactId)
    {
        $contacts = Client::find($contactId)->contacts;
        echo "Teste com branch development";
        exit();
        return view('contacts.index',compact($contacts));
    }
}
