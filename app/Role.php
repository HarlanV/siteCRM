<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{ 
    public $timestamps = false;
    protected $fillable = [
        'roleName',
        'director',
        'viewClient',
        'editClient',
        'editMember',
        'viewMember',
        'createLogin',
    ];
}
