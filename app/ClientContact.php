<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientRegister;

class ClientContact extends Model
{
   
   // Não adicionar data de criação ou ultima atuliação
   public $timestamps = false;

   // Informa atributos que podem ser preenchidos por create ('nome','etc')
   protected $fillable = ['phone','email','correspondent','bestHour'];
   protected $attributes = [
    'correspondent'=>'Setor Comercial',
    'email'=>'clientecomercial@gmail.com'
];
   

   // Relacionamento n:1 com Contato
   public function clientRegister()
   {
       return $this->belongsTo(ClientRegister::class);
   }

}
