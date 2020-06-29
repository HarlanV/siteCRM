<?php
namespace App\services;

use App\ClientContact;
use App\ClientSector;
use Illuminate\Support\Facades\DB;

class SectorDeleter
{
    /**
     * Metodo para deleção de contatos de determinado cliente
     * 
     * @param   \App\ClientSector $sector
     * @return  string              $name
     */
    public function deleteSector(ClientSector $sector): string
    {
        $name = $sector->sector;
        DB::beginTransaction();
            $this->contactDelete($sector);
            $sector->delete();
        DB::commit();
        return $name; 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\ClientSector  $client
     * @return  void
     */
    protected function contactDelete($clientSector)
    {
        $clientSector->clientContacts->each(function (ClientContact $ClientContact)
        {
            $ClientContact->delete();
        });
    }
}