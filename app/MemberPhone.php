<?php

namespace App;

use app\Member;
use Illuminate\Database\Eloquent\Model;

class MemberPhone extends Model
{

    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;
    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['name'];
    
    // Relacionamento n:1 com Membro
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
