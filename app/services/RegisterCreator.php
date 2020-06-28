<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class RegisterCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function createRegister($request)
    {
        $id = $request->id;
        DB::beginTransaction();
        $client = Client::find($id);
        $register = $client->clientRegisters()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
            'comment'=> $request->comment,
        ]);

        $this->createContact($request,$register);
        DB::commit();
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   \App\ClientRegister         $register
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