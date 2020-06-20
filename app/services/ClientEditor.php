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
     * @param   int $id
     * @param   int $id_Register
     * @param   Illuminate\Http\Request $request
     * @return  App\Client              $client
     */
    public function clientEdite($id ,$id_Register, Request $request)    {


        DB::beginTransaction();
                $client = Client::find($id);

                $client->name = $request->name;
                $client->comment=$request->comment;
                $client->status=$request->status;
                $client->market=$request->market;
                $client->save();

           $this->editSector($id, $id_Register, $request);

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
     * @param   string      $state
     * @param   string      $city
     * @param   string      $adress
     * @return  void
     */
    private function editSector($id,$id_Register, $request)
    {
        // id_register não sendo usado no momento, espaço reservado para quando programa for atualizado.       
            $registers =Client::find($id)->clientRegisters;

            // alterar quando houver mais de um registro; Proximo passo
            $register = $registers->first();
            $register->sector = $request->sector;     
            $register->state = $request->state;
            $register->city = $request->city;
            $register->adress= $request->adress;
            $register->save();     
        
        $this->createContact($id,$request);

    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\ClientContact  $name
     * @param   string              $phone
     * @return  void
     */
    private function createContact($id,$request)
    {
        $register =Client::find($id)->clientRegisters->first();
        $it = 0;
        foreach ($register->clientContacts as $contact) {
            $contact->phone = $request->{'phone'.($it)};
            $contact->email = $request->{'email'.($it)};
            $contact->correspondent = $request->{'correspondent'.($it)};           
            $it++;
        }
        $register->save();  
    }
}
