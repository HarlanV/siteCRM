<?php
namespace App\services;

use App\ClientContact;
use App\ClientRegister;
use Illuminate\Support\Facades\DB;

class RegisterDeleter
{
    /**
     * Metodo para deleção de contatos de determinado cliente
     * 
     * @param   \App\ClientRegister $register
     * @return  string              $name
     */
    public function deleteRegister(ClientRegister $register): string
    {
        $name = $register->sector;
        DB::beginTransaction();
            $this->contactDelete($register);
            $register->delete();
        DB::commit();
        return $name; 
    }

    /**
     * Metodo complementar para deletear clients em cascata.
     * 
     * @param   \App\ClientRegister  $client
     * @return  void
     */
    protected function contactDelete($clientRegister)
    {
        $clientRegister->clientContacts->each(function (ClientContact $ClientContact)
        {
            $ClientContact->delete();
        });
    }
}