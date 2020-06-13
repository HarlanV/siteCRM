<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class ClienteTelefone extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['telefone'];

    // Relacionamento n:1 com Contato
    public function contato()
    {
        return $this->belongsTo(ClienteContato::class);
    }
}
