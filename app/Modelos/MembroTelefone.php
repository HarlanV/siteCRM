<?php

namespace App\Modelos;

use App\Modelos\MembroContato;
use Illuminate\Database\Eloquent\Model;

class MembroTelefone extends Model
{

    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;
    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['nome'];
    
    // Relacionamento n:1 com Membro
    public function membro()
    {
        return $this->belongsTo(MembroContato::class);
    }
}
