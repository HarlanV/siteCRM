<?php

namespace App;
use App\MemberPhone;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name'];

    protected $attributes = [
        'sex'=>'F',
        'role'=>'Analista',
        'comment'=>'Nenhum comentario. Default'
    ];
 
    /**
    * Metodo de relacionamento 1:n com registro
    *  
    * @param    null
    * @return   \App\MemberPhone
    */
    /*
    public function phones()
    {
        return $this->hasMany(MemberPhone::class);
    }
    */
}
