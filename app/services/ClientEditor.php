<?php
namespace App\services;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientEditor
{
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int                      $id
     * @param   int                      $id_Sector
     * @param   \Illuminate\Http\Request $request
     * @return  string                   $client
     */
    public function clientEdite($id ,$id_Sector, Request $request)
    {
        DB::beginTransaction();
            $client = Client::find($id);
            $client->name = $request->name;
           
            $client->status=$request->status;
            $client->market=$request->market;
            $this->editSector($id, $id_Sector, $request);
            $client->save();
            $nameclient = $client->name;
        DB::commit();        
        return $nameclient;
    }
    
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int                      $id
     * @param   int                      $id_Sector
     * @param   \Illuminate\Http\Request $request
     * @return  void
     */
    private function editSector($id,$id_Sector, $request)
    {
        $sectors =Client::find($id)->clientSectors;
        $sector = $sectors->find($id_Sector);
        $sector->sector = $request->sector;     
        $sector->state = $request->state;
        $sector->city = $request->city;
        $sector->adress= $request->adress;
        $sector->comment= $request->comment;
        $sector->save();         
        $this->editContact($id, $id_Sector, $request);
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int                      $id
     * @param   \Illuminate\Http\Request $request
     * @param   int $id_Sector
     * @return  void
     */
    private function editContact($id, $id_Sector, $request)
    {
        $sectors =Client::find($id)->clientSectors;
        $sector = $sectors->find($id_Sector);
        $it = 0;


        foreach ($sector->clientContacts as $contact) {
            $contact->phone = $request->phone[$it];
            $contact->email = $request->email[$it];
            $contact->correspondent = $request->correspondent[$it];
            $contact->bestHour = $request->bestHour[$it];
            $contact->save();           
            $it++;
        }

        if (!empty($request->contador)){
            
            $counter =(int) $request->contador;
            $counter += $it - 1; 

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
}
