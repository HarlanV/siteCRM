<?php
namespace App\services;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberCreator
{

    /**
     * Service de criação de membros
     * 
     * @param   Illuminate\Http\Request $request
     * @return  string  $nameclient
     */
    public function createMember(Request $request)
    {
        DB::beginTransaction();
        $role = Role::find($request->id_role);
        $member = $role->members()->create([
            'name' => $request->name,
            'sexId' => $request->sexId,
            'comment' => $request->comment,
        ]);

        $this->createDocument($member, $request);
        $this->createContact($member,$request);
        $member->save();

        DB::commit();
    }
    
    /**
     * Metodo para armazenar registro de membros
     * 
     * @param   \App\Member                 $member
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    private function createDocument($member,Request $request)
    {
        $document = $member->memberDocuments()->create([
            'cpf'=> $request->cpf,
            'rg'=> $request->rg,
            'rgEntity' => $request->rgEntity,
            'name' => $request->documentName,
            'birthdate'=> $request->birthdate,
            'traineeStart'=> $request->traineeStart,
            'traineeFinish'=> $request->traineeFinish,
            'effectivated'=> $request->effectivated,
            'disconected'=> $request->disconected,
            
        ]);
        
        $document->save();
    }

    /**
     * Service para armazenar contatos de membros
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   \App\ClientDocument         $document
     * @return  void
     */
    private function createContact($member,Request $request)
    {
        $contact = $member->memberContacts()->create([
        'primaryEmail' => $request->email[0],
        'secondaryEmail' => $request->email[1],
        'primaryPhone'=> $request->phone[0],
        'secondaryPhone' =>$request->phone[1],
        'adress'=> $request->adress,
        'state'=> $request->state,
        'city'=> $request->city,
        'cep'=> $request->cep,
        ]);
        $contact->save();
    }

}