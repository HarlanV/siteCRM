<?php
namespace App\services;

use App\Client;
use App\ClientContact;
use App\ClientSector;
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
            $this->SectorDelete($client);
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
    protected function SectorDelete($client): void
    {
        $client->clientSectors->each(function (ClientSector $clientSector)
        {
            $this->contactDelete($clientSector);

            $clientSector->delete();
        }); 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\ClientSector  $client
     * @return  void
     */
    protected function contactDelete($clientSector): void
    {
        $clientSector->clientContacts->each(function (ClientContact $ClientContact)
        {
            $ClientContact->delete();
        });
    }
}