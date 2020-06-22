<?php

namespace App;

use app\Member;
use Illuminate\Database\Eloquent\Model;

class MemberPhone extends Model
{

    
    public $timestamps = false;
    
    protected $fillable = ['name'];
    
    /**
    * Metodo de relacionamento n:1 com membro
    *  
    * @param    null
    * @return   \App\Member
    */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
