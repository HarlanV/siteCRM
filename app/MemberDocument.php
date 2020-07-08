<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberDocument extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'cpf',
        'rg',
        'rgEntity',
        'birthdate',
        'traineeStart',
        'traineeFinish',
        'effectivated',
        'disconected',
        'name',
    ];
    
    /**
     * Metodo de relacionamento 1:n com membro
     *  
     * @param    null
     * @return   \App\MemberPhone
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
    

}
