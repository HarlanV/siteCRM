<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class PhoneCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\ClientContact  $name
     * @param   string              $phone
     * @return  void
     */
    private function createPhone($contact,$phone)
    {
        DB::beginTransaction();
        $contact->phones()->create(['phone'=>$phone]);
        DB::commit();
    }

}