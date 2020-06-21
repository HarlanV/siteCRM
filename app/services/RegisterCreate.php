<?php
namespace App\services;

use Illuminate\Support\Facades\DB;

class ContactCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client                 $client
     * @param   \Illuminate\Http\Request    $request
     * @param   int                         $counter
     * @return  string                      $registerSector
     */
    public function createRegister($client, $request, $counter)
    {
        DB::beginTransaction();
        $register = $client->clientRegisters()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
        ]);
        $this->createContact($request, $counter,$register);
        DB::commit();
        $registerSector = $register->sector;
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client $client
     * @param   string      $sector
     * @param   string      $phone
     * @return  void
     */
    private function createContact($request, $counter, $register)
    {

        $it = 0;
        while($it <= $counter){
            $contact = $register->clientContacts()->create([
                'phone'=>$request->{'phone'.($it)},
                'email'=>$request->{'email'.($it)},
                'correspondent'=>$request->{'correspondent'.($it)},           
            ]);   
            $it++;
        }
        $contact->save();

    }
}