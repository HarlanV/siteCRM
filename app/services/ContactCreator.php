<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class ContactCreator
{
   
    
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client $client
     * @param   string      $sector
     * @param   string      $phone
     * @return  void
     */
    private function createContacts($client, $sector, $phone)
    {
        
        DB::beginTransaction();
        
        $contact = $client->contacts()->create(['sector' =>$sector]);
        $this->createPhone($contact, $phone);
        DB::commit();
        $nameContact = $contact->name;
        return $nameContact;
    }

        /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\ClientContact  $name
     * @param   string              $phone
     * @return  void
     */
    private function createPhone($contact,$phone)
    {
        $telefone = $contact->phones()->create(['phone'=>$phone]);
    }

}