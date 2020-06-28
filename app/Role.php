<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;

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

    /**
     * Metodo de relacionamento 1:n com membros
     *  
     * @param    null
     * @return   \App\MemberPhone
     */
    public function members()
    {
        return $this->hasMany(Member::class);
    }

}
