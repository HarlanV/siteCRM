<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class ClientCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   string      $name
     * @param   string      $sector
     * @param   string      $phone
     * @return  App\Client  $client
     */
    public function clientCreate($name, $sector, $phone)
    {
        DB::beginTransaction();
            //[ok]
            $client= Client::create(['name'=>$name]);
            $this->createContacts($client, $sector, $phone);
            $client->save();
            $nameclient = $client->name;
        DB::commit();   
        
        return $nameclient;
    }
    
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
        $contact = $client->contacts()->create(['sector' =>$sector]);
        $this->createPhone($contact, $phone);
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