<?php
namespace App\Http\Modelos;

use Illuminate\Database\Eloquent\Model;
class Membro extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
}