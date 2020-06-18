<?php

namespace App;


use App\Client;
use App\ClientContact;
use Illuminate\Database\Eloquent\Model;


class ClientRegister extends Model
{
    public $timestamps = false;

    protected $fillable = ['sector','state','city','adress'];

    public function contacts()
    {
        return $this->hasMany(ClientContact::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
