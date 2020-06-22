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
     * @param   int                      $id_Register
     * @param   \Illuminate\Http\Request $request
     * @return  string                   $client
     */
    public function clientEdite($id ,$id_Register, Request $request)
    {
        DB::beginTransaction();
            $client = Client::find($id);
            $client->name = $request->name;
            $client->comment=$request->comment;
            $client->status=$request->status;
            $client->market=$request->market;
            $this->editSector($id, $id_Register, $request);
            $client->save();
            $nameclient = $client->name;
        DB::commit();        
        return $nameclient;
    }
    
    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int                      $id
     * @param   int                      $id_Register
     * @param   \Illuminate\Http\Request $request
     * @return  void
     */
    private function editSector($id,$id_Register, $request)
    {
        $registers =Client::find($id)->clientRegisters;
        $register = $registers->first();
        $register->sector = $request->sector;     
        $register->state = $request->state;
        $register->city = $request->city;
        $register->adress= $request->adress;
        $register->save();         
        $this->editContact($id,$request);
    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   int                      $id
     * @param   \Illuminate\Http\Request $request
     * @return  void
     */
    private function editContact($id,$request)
    {
        $register =Client::find($id)->clientRegisters->first();
        $it = 0;
        foreach ($register->clientContacts as $contact) {
            $contact->phone = $request->phone[$it];
            $contact->email = $request->email[$it];
            $contact->correspondent = $request->correspondent[$it];
            $contact->bestHour = $request->bestHour[$it];
            $contact->save();           
            $it++;
        } 
    }
}
