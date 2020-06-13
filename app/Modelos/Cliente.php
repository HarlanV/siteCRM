<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

/**
 * Atenção! suas Models ficam na raiz da pasta App! não é necessário criar uma pasta para
 * guardar as models.
 */
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
