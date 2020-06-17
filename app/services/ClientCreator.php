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
     * @param   string      $email
     * @param   string      $correspondent
     * @return  App\Client  $client
     */
    public function clientCreate($name, $sector, $phone, $email, $correspondent)
    {
        DB::beginTransaction();
            $client= Client::create(['name'=>$name]);
            $this->createSector($client, $sector, $phone,$email,$correspondent);
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
     * @param   string      $email
     * @param   string      $correspondent
     * @return  void
     */
    private function createSector($client, $sector, $phone, $email,$correspondent)
    {
        $sector = $client->sectors()->create(['sector' =>$sector]);
        $this->createContact($sector, $phone, $email, $correspondent);
    }

        /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\ClientContact  $name
     * @param   string              $phone
     * @return  void
     */
    private function createContact($sector,$phone,$email,$correspondent)
    {
        $telefone = $sector->contacts()->create([
            'phone'=>$phone,
            'email'=>$email,
            'correspondent'=>$correspondent
            ]);
        
    }

}