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
     * @return  App\Client              $client
     */
    public function clientCreate(Request $request)
    {
    $counter =(int) $request->contador;
        DB::beginTransaction();
            $client= Client::create([
                'name'=>$request->name,
                'comment'=>$request->comment,
                'status'=>$request->status,
                'market'=>$request->market
                ]);

            $this->createRegister($client, $request,$counter);
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
     * @param   int                         $counter
     * @return  void
     */
    private function createRegister($client, $request, $counter)
    {
        $register = $client->clientRegisters()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
        ]);
        $this->createContact($request, $counter,$register);
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   int                         $counter
     * @param   \App\ClientRegister         $register
     * @return  void
     */
    private function createContact($request, $counter, $register)
    {
        $it = 0;
        while($it <= $counter){
            $register->clientContacts()->create([
                'phone'=>$request->{'phone'.($it)},
                'email'=>$request->{'email'.($it)},
                'correspondent'=>$request->{'correspondent'.($it)},           
            ]);   
            $it++;
        }  
    }
}