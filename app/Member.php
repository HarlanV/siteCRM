<?php

namespace App;
use App\Role;

use App\MemberContact;
use App\MemberDocument;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    // 
     public $timestamps = false;
    
     protected $fillable = ['name','sexId','comment','active','role_id'];

     protected $attributes = [
        'comment'=>'Nenhum comentario. Default',
        'active'=> true
     ];

    /**
     * Metodo de relacionamento n:1 com cargos
     *  
     * @param    null
     * @return   \App\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Metodo de relacionamento 1:n com documentos
     *  
     * @param    null
     * @return   \App\MemberDocument
     */
    public function MemberDocuments()
    {
        return $this->hasOne(MemberDocument::class);
    }

    /**
     * Metodo de relacionamento 1:n com contato
     *  
     * @param    null
     * @return   \App\MemberContact
     */
    public function MemberContacts()
    {
        return $this->hasOne(MemberContact::class);
    }

}
