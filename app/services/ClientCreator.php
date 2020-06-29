<?php
namespace App\services;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Nós adotamos os métodos que acessam o banco de dados, que criam, que editam ou destroem na model.
// Isso é algo que a alura confunde no curso que ela ministra. Services não são responsáveis por isso.
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
                'status'=>$request->status,
                'market'=>$request->market
                ]);
            $this->createSector($client, $request);
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
    private function createSector($client, $request)
    {
        $sector = $client->clientSectors()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
            'comment'=>$request->comment,
        ]);
        $this->createContact($request,$sector);
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   \App\ClientSector         $sector
     * @return  void
     */
    private function createContact($request, $sector)
    {
        $counter =(int) $request->contador;
        $it = 0;
        while($it <= $counter){
            $sector->clientContacts()->create([
                'phone'=>$request->phone[$it],
                'email'=>$request->email[$it],
                'correspondent'=>$request->correspondent[$it],
                'bestHour'=>$request->bestHour[$it],           
            ]);   
            $it++;
        }  
    }
}