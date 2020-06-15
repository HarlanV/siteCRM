<?php
namespace App\services;

use App\Client;
use App\ClientPhone;
use App\ClientContact;
use Illuminate\Support\Facades\DB;

class ClientDeleter
{
    /**
     * Metodo para deleção de clientes
     * 
     * @param   int  $clienId
     * @return  string  $name
     */
    public function clientDelete(int $clientId)
    {
        DB::beginTransaction();
            
            $client = Client::find($clientId);
            $name = $client->name;

            $this->contactDelete($client);

            $client->delete();
        DB::commit();

        return $name;
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\Client  $client
     * @return  void
     */
    protected function contactDelete($client): void
    {
        $client->contacts->each(function (ClientContact $clientContact)
        {
            $this->phoneDelete($clientContact);

            $clientContact->delete();
        }); 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\Contact  $client
     * @return  void
     */
    protected function phoneDelete($clientContact): void
    {
        $clientContact->phones()->each(function (ClientPhone $clientPhone)
        {
            $clientPhone->delete();
        });
    }


}