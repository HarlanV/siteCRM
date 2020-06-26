<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientRegister;

class Client extends Model
{   
    public $timestamps = false;

    protected $fillable = ['name','market','status'];
    protected $attributes = [
        'status'=>'em prospecção',
        'market'=>'Quimico e Petroquimico',
        'status'=>'Prospectanto',
        'contactTimes'=>0,
        'prospect'=>false
    ];
    
    /**
    * Metodo de relacionamento 1:n com registro
    *  
    * @param    null
    * @return   \App\ClientRegister
    */
    public function clientRegisters()
    {
        return $this->hasMany(ClientRegister::class);
    }
}
