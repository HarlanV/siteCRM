<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientContact;

class Client extends Model
{   
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;

    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['name'];
    
    // Relacionamento 1:n com Contatos
    public function contacts()
    {
        return $this->hasMany(ClientContact::class);
    }
}
