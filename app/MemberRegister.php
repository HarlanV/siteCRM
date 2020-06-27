<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberRegister extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'cpf',
        'rg',
        'traineeStart',
        'traineeFinish',
        'effectivated',
        'disconected',
    ];


    

}
