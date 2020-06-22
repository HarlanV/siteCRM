<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class RegisterCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client                 $client
     * @param   \Illuminate\Http\Request    $request
     * @param   int                         $counter
     * @return  string                      $registerSector
     */
    public function createRegister($id, $request)
    {
        DB::beginTransaction();
        $client = Client::find($id);
        $register = $client->clientRegisters()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
        ]);

        $this->createContact($request,$register);
        DB::commit();
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client $client
     * @param   string      $sector
     * @param   string      $phone
     * @return  void
     */
    private function createContact($request, $register)
    {
        $counter =(int) $request->contador;
        $it = 0;
        while($it <= $counter){
            $contact = $register->clientContacts()->create([
                'phone'=>$request->phone[$it],
                'email'=>$request->email[$it],
                'correspondent'=>$request->correspondent[$it],
                'bestHour'=>$request->bestHour[$it],    
            ]);   
            $it++;
        }        
        $contact->save();

    }
}