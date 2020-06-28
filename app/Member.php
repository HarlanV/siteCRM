<?php

namespace App;
use App\Role;

use App\MemberContact;
use App\MemberRegister;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     public $timestamps = false;
    
     protected $fillable = ['name','sexId','comment','active'];

     protected $attributes = [
        'comment'=>'Nenhum comentario. Default',
        'active'=> true
     ];

    /**
     * Metodo de relacionamento n:1 com registro
     *  
     * @param    null
     * @return   \App\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Metodo de relacionamento 1:n com registro
     *  
     * @param    null
     * @return   \App\MemberRegister
     */
    public function MemberRegisters()
    {
        return $this->hasMany(MemberRegister::class);
    }

    /**
     * Metodo de relacionamento 1:n com contato
     *  
     * @param    null
     * @return   \App\MemberContact
     */
    public function MemberContacts()
    {
        return $this->hasMany(MemberContact::class);
    }

}
