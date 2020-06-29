<?php
namespace App\services;

use App\Client;
use Illuminate\Support\Facades\DB;

class SectorCreator
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int $id
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    public function createSector($request)
    {
        $id = $request->id;
        DB::beginTransaction();
        $client = Client::find($id);
        $sector = $client->clientSectors()->create([
            'sector' => $request->sector,
            'state' => $request->state,
            'city' => $request->city,
            'adress'=> $request->adress,
            'comment'=> $request->comment,
        ]);

        $this->createContact($request,$sector);
        DB::commit();
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
            $contact = $sector->clientContacts()->create([
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