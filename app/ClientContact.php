<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientSector;

class ClientContact extends Model
{
   
   public $timestamps = false;

   protected $fillable = ['phone','email','correspondent','bestHour'];
   protected $attributes = [
    'correspondent'=>'Setor Comercial',
    'email'=>'clientecomercial@gmail.com'
];
   
   /**
    * Metodo de relacionamento n:1 com registro
    *  
    * @param    null
    * @return   \App\ClientRegister
    */
   public function clientSectors()
   {
       return $this->belongsTo(ClientSector::class);
   }

}
