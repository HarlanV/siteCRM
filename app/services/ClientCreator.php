<?php
namespace App\services;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   Illuminate\Http\Request $request
     * @return  string  $nameclient
     */
    public function clientCreate(Request $request)
    {
        DB::beginTransaction();
            $client= Client::create([
                'name'=>$request->name,
                'comment'=>$request->comment,
                'status'=>$request->status,
                'market'=>$request->market
                ]);

            $this->createRegister($client, $request);
            $client->save();
            $nameclient = $client->name;
        DB::commit();   
        
        return $nameclient;
    }
    
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\Client                 $client
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    private function createRegister($client, $request)
    {
        $register = $client->clientRegisters()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
        ]);
        $this->createContact($request,$register);
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
            $register->clientContacts()->create([
                'phone'=>$request->phone[$it],
                'email'=>$request->email[$it],
                'correspondent'=>$request->correspondent[$it],
                'bestHour'=>$request->bestHour[$it],           
            ]);   
            $it++;
        }  
    }
}