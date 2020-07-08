<?php

namespace App;

use App\Role;
use App\MemberContact;
use App\MemberDocument;
use Illuminate\Database\Eloquent\Model;
use App\services\MemberCreator;
use App\services\MemberDeleter;
use App\services\MemberEditor;
use Illuminate\Http\Request;

class Member extends Model
{

    // 
     public $timestamps = false;
    
     protected $fillable = ['name','sexId','comment','active','role_id'];

     protected $attributes = [
        'comment'=>'Nenhum comentario. Default',
        'active'=> true
     ];

    /**
     * Metodo de relacionamento n:1 com cargos
     *  
     * @param    null
     * @return   \App\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Metodo de relacionamento 1:n com documentos
     *  
     * @param    null
     * @return   \App\MemberDocument
     */
    public function MemberDocuments()
    {
        return $this->hasOne(MemberDocument::class);
    }

    /**
     * Metodo de relacionamento 1:n com contato
     *  
     * @param    null
     * @return   \App\MemberContact
     */
    public function MemberContacts()
    {
        return $this->hasOne(MemberContact::class);
    }

    /**
     * Método de exibição da listagem de membros já inseridos
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function listMembers()
    {
        $members = self::query()->orderBy('name')->get();
        return $members;
    }

    /**
     * Metodo para armazenagem membros no banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function storeMember(Request $request)
    {
        $creator = new MemberCreator;
        
        $member = $creator->createMember($request);

        $request->session()->flash('mensagem',"Membro {$member} inserido com sucesso");
    }

    /**
     * Metodo de deleção de membro do banco de dados Members
     * 
     * @param   \Illuminate\Http\Request    $request
     */
    public static function deleteMember(Request $request){
        
        $deleter = new MemberDeleter;

        $deleted = $deleter->memberDelete($request->id);

        $request->session()->flash('mensagem',"O membro {$deleted} foi excluido com sucesso");
        
    }

    public static function member($request)
    {
        $member = self::find($request->id);

        return $member;

    }

    public static function edit($request)
    {
        $editor = new MemberEditor;

        $editedClient = $editor->editMember($request->id, $request);

        $request->session()->flash('mensagem',"Informações do membro '{$request->sector}' do cliente {$editedClient} alteradas com sucesso");  

    }



}
