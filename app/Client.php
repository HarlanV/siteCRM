<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientRegister;

class Client extends Model
{   
    public $timestamps = false;

    protected $fillable = ['name'];
    protected $attributes = [
        'comment'=>'Cliente ainda não foi entrado em contato por não existir. Default',
        'status'=>'em prospecção',
    ];
    
    // Relacionamento 1:n com Contatos
    public function registers()
    {
        return $this->hasMany(ClientRegister::class);
    }
}
