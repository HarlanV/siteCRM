<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Member;

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
        'cep',
    ];

    /**
     * Metodo de relacionamento 1:n com registro
     * @param    null
     * @return   \App\MemberPhone
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
