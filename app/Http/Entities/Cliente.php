<?php
namespace App\Http\Entities;

use Illuminate\Database\Eloquent\Model;
class Cliente extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
}