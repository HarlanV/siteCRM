<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientContact;
class ClientPhone extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['phone'];

    // Relacionamento n:1 com Contato
    public function contact()
    {
        return $this->belongsTo(ClientContact::class);
    }

}
