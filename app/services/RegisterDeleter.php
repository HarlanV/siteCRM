<?php
namespace App\services;

use App\Client;
use App\ClientContact;
use App\ClientRegister;
use Illuminate\Support\Facades\DB;

class ClientDeleter
{
    /**
     * Metodo para deleção de contatos de determinado cliente
     * 
     * @param   App\Client  $client
     * @return  string      $name
     */
    public function registerDelete(Client $client): string
    {
        $name = $client->name;
        DB::beginTransaction();
            $client->clientRegisters->each(function (ClientRegister $clientRegister)
            {
                $this->contactDelete($clientRegister);
                $clientRegister->delete();
            });
        DB::commit();
        return $name; 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\ClientRegister  $client
     * @return  void
     */
    protected function contactDelete($clientRegister): void
    {
        $clientRegister->clientContacts->each(function (ClientContact $ClientContact)
        {
            $ClientContact->delete();
        });
    }
}