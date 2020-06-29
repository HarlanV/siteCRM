<?php

namespace App;


use App\Client;
use App\ClientContact;
use Illuminate\Database\Eloquent\Model;


class ClientSector extends Model
{
    public $timestamps = false;

    protected $fillable = ['sector','state','city','adress','comment'];    

    /**
     * Metodo de relacionamento 1:n com contato
     *  
     * @param    null
     * @return   \App\ClientContact
     */
    public function clientContacts()
    {
        return $this->hasMany(ClientContact::class);
    }

    /**
     * Metodo de relacionamento n:1 com contato
     *  
     * @param    null
     * @return   \App\Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
