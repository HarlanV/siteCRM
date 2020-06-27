<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberContact extends Model
{
    public $timestamps = false;
    protected $fillable =[
        'primaryEmail',
        'secondaryEmail',
        'primaryPhone',
        'secondaryPhone',
        'adress',
        'state',
        'city',
    ];


}
