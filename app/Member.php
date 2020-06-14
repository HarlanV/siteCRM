<?php

namespace App;
use App\MemberPhone;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    // criar model e migration com documentos [pendente!]
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Lista de atributos preenchiveis ['name','etc']
    protected $fillable = ['name'];

    // Valores predefinidos
    protected $attributes = [
        'login'=>'login01',
        'password'=>'14324adfasdfp',
        'role'=>'Analista',
        'primaryEmail'=>'teste01@gmail.com',
        'secondaryEmail'=>''
    ];
 
    // Relacionamento 1:n com Telefone
    public function phones()
    {
        return $this->hasMany(MemberPhone::class);
    }
}
