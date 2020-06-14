<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientContact;

class ContactController extends Controller
{

    /**
     * Recebe e armazena os contatos de um novo cliente 
     * 
     * @param   contactId
     * @return  views\clients\create
     */
    public function index(int $clientId)
    {

        $sectors = Client::find($clientId)->contacts;
        $phone = ClientContact::query()->where('')
        var_dump($phone);
        exit();

        return view('contacts.list',compact('sectors'));
    }
}
