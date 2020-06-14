<?php

namespace App;

use App\Client;
use App\ClientPhone;
use Illuminate\Database\Eloquent\Model;

class ClientContact extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['sector'];

    // Relacionamento 1:n com Telefone
    public function phones()
    {
        return $this->hasMany(ClientPhone::class);
    }

    // Rleacionamento n:1 com clientes
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
