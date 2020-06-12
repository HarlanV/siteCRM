<?php
namespace App\Http\Entidades;

use Illuminate\Database\Eloquent\Model;
class Membro extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
}