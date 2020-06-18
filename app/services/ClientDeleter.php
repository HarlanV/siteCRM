<?php
namespace App\services;

use App\Client;
use App\ClientContact;
use App\ClientRegister;
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

            $this->registerDelete($client);

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
    protected function registerDelete($client): void
    {
        $client->registers->each(function (ClientRegister $clientRegister)
        {
            $this->contactDelete($clientRegister);

            $clientRegister->delete();
        }); 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\ClientRegister  $client
     * @return  void
     */
    protected function contactDelete($clientRegister): void
    {
        $clientRegister->contacts()->each(function (ClientContact $ClientContact)
        {
            $ClientContact->delete();
        });
    }


}