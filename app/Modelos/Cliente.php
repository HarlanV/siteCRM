<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;
    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['nome'];
    
    // Relacionamento 1:n com Contatos
    public function contatos()
    {
        return $this->hasMany(ClienteContato::class);
    }


}
