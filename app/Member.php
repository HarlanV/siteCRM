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
        'login'=>'login01',
        'password'=>'14324adfasdfp',
        'role'=>'Analista',
        'primaryEmail'=>'teste01@gmail.com',
        'secondaryEmail'=>''
    ];
 
    /**
    * Metodo de relacionamento 1:n com registro
    *  
    * @param    null
    * @return   \App\MemberPhone
    */
    public function phones()
    {
        return $this->hasMany(MemberPhone::class);
    }
}
