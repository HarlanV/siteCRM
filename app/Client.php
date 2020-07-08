<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClientSector;

use Illuminate\Http\Request;
use App\services\ClientEditor;
use App\services\ClientCreator;
use App\services\ClientDeleter;


class Client extends Model
{   
    public $timestamps = false;

    protected $fillable = ['name','market','status'];

    protected $attributes = [
        'status'=>'em prospecção',
        'market'=>'Quimico e Petroquimico',
        'status'=>'Prospectanto',
        'contactTimes'=>0,
        'prospect'=>false
    ];
    
    /**
     * Metodo de relacionamento 1:n com registro
     *  
     * @param    null
     * @return   \App\ClientSector
     */
    public function clientSectors()
    {
        return $this->hasMany(ClientSector::class);
    }


    /**
     * Função para criar lista de clientes
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function list()
    {
        $clients = self::query()->orderBy('name')->get();
        return $clients;

    }

    /**
     * Armazena clientes no banco de dados
     * 
     * @param   \Illuminate\Http\request $request
     * @return  void
     */
    public static function store(Request $request)
    {     
        $clientCreator = new ClientCreator;

        $client = $clientCreator->clientCreate($request);

        $request->session()->flash('mensagem',"Cliente {$client} e seus contatos inserido com sucesso");
    }

    /**
     * Retorna/Redireciona para formulario de criação de clientes
     * 
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function del(Request $request)
    {
        $deleter = new ClientDeleter;

        $clientId = $request->id;

        $deletedClient = $deleter->clientDelete($clientId);

        $request->session()->flash('mensagem',"O Cliente {$deletedClient} foi excluido com sucesso");

    }

    /**
     * Metodo para realizar a edição de clientes
     * 
     * @param   int    $request
     * @param   int    $request
     * @param   \Illuminate\Http\request    $request
     * @return  void
     */
    public static function edit(Request $request)
    {
        $editor = new ClientEditor;

        $editedClient = $editor->clientEdite($request->id, $request->id_sector, $request);

        $request->session()->flash('mensagem',"O setor '{$request->sector}' do cliente {$editedClient} foi editado com sucesso");  
    }
    
    /**
     * Retorna um formulário para edição de clientes
     * 
     */
    public static function editableForm(Request $request)
    {
        $client = self::find($request->id);

        $sector = ClientSector::find($request->id_sector);

        $contacts = $sector->clientContacts;
        
        $viewOnly = false;

        $contactsCounts = $contacts->count();

        echo view('clients.edit',compact('client','sector','contacts','contactsCounts','viewOnly'));

    }

    /**
     * Retorna um cliente dado o Id. GETClient
     * Deve ser renomeado para getClient ? Pensando...[pendente!]
     * 
     */
    public static function client(int $id)
    {
        $client = Client::find($id);
        return $client;
    }

}
