<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientRegister;

class Client extends Model
{   
    public $timestamps = false;

    protected $fillable = ['name','comment','market'];
    protected $attributes = [

        'status'=>'em prospecção',
    ];
    
    // Relacionamento 1:n com Contatos
    public function clientRegisters()
    {
        return $this->hasMany(ClientRegister::class);
    }
}
