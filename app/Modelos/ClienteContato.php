<?php

namespace App\Modelos;

use App\Modelos\ClienteTelefone;
use Illuminate\Database\Eloquent\Model;

class ClienteContato extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['setor'];

    // Relacionamento 1:n com Telefone
    public function telefones()
    {
        return $this->hasMany(ClienteTelefone::class);
    }

    // Rleacionamento n:1 com clientes
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
