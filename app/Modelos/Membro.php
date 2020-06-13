<?php
namespace App\Modelos;

use App\Modelos\MembroContato;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    // Não adicionar data de criação ou ultima atuliação
    public $timestamps = false;
    // Informa atributos que podem ser preenchidos por create ('nome','etc')
    protected $fillable = ['nome'];

    // Relacionamento 1:n com Telefone
    public function telefones()
    {
        return $this->hasMany(MembroContato::class);
    }

}