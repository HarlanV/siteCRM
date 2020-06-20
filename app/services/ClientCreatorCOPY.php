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
    $name=$request->name;
    $comment = $request->comment;
    $status = $request->status;
    $market = $request->market;
    $sector = $request->sector;
    $state =$request->state;
    $city =$request->city;
    $adress =$request->adress;
    $counter =(int) $request->contador;
    $phone=[];
    $email=[];
    $correspondent=[];
    $it = 0;

    while($it < ($counter+1) ){
        $phoneName='phone'.($it);
        $emailName='email'.($it);
        $coorepName='correspondent'.($it);
        $phone[$it]= $request->{$phoneName};
        $email[$it]=$request->{$emailName};
        $correspondent[$it]=$request->{$coorepName};
        $it++;
    } 

        DB::beginTransaction();
            $client= Client::create([
                'name'=>$name,
                'comment'=>$comment,
                'status'=>$status,
                'market'=>$market
                ]);

            $this->createSector($client, $sector, $phone,$email,$correspondent, $state, $city, $adress,$counter);

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
    private function createSector($client, $sector, $phone,$email,$correspondent, $state, $city, $adress, $counter)
    {
        //$client, $sector, $state, $city, $adress, $phone, $email, $correspondent

        


        $register = $client->registers()->create([
            'sector' => $sector,
            'state' => $state,
            'city' => $city,
            'adress'=> $adress,
            ]);

        $this->createContact($register, $phone, $email, $correspondent, $counter);

    }

    /**
     * Service de criação de clientes e contatos
     * 
     * @param   \App\ClientContact  $name
     * @param   string              $phone
     * @return  void
     */
    private function createContact($register,$phone,$email,$correspondent, $counter)
    {
        $it = 0;
        while($it <= $counter){
            $register->contacts()->create([
                'phone'=>$phone[$it],
                'email'=>$email[$it],
                'correspondent'=>$correspondent[$it],
                
            
            ]);   
            $it++;
        }  
    }
}