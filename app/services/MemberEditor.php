<?php
namespace App\services;

use App\Role;
use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberEditor
{

    /**
     * Service de criação de membros
     * 
     * @param   Illuminate\Http\Request $request
     * @return  string  $nameclient
     */
    public function editMember(int $id, Request $request)
    {

        DB::beginTransaction();
            $member = Member::find($id);
            $member->name = $request->name;
            $member->sexId = $request->sexId;
            $member->role_id = $request->id_role;
//            $role = Role::find((int) $request->id_role);
//            $member->role->associate($role);
            $this->editDocument($id, $request);
            $this->editContact($id, $request);

            $member->save();
            $nameMember = $member->name;
        DB::commit();        
        return $nameMember;
    }
    
    /**
     * Metodo para armazenar registro de membros
     * 
     * @param   \App\Member                 $member
     * @param   \Illuminate\Http\Request    $request
     * @return  void
     */
    private function editDocument($id,Request $request)
    {

        $documents = Member::find($id)->memberDocuments; 
        $documents->cpf = $request->cpf;
        $documents->rg = $request->rg;
        $documents->name  = $request->documentName;
        $documents->birthdate = $request->birthdate;
        $documents->traineeStart = $request->traineeStart;
        $documents->traineeFinish = $request->traineeFinish;
        $documents->effectivated = $request->effectivated;
        $documents->disconected = $request->disconected;
        
        $documents->save();
    }

    /**
     * Service para armazenar contatos de membros
     * 
     * @param   \Illuminate\Http\Request    $request
     * @param   \App\ClientDocument         $document
     * @return  void
     */
    private function editContact($id,Request $request)
    {

        $member = Member::find($id);
    
        $contact = $member->memberContacts;
        $contact->primaryEmail  = $request->email[0];
        $contact->secondaryEmail  = $request->email[1];
        $contact->primaryPhone = $request->phone[0];
        $contact->secondaryPhone  =$request->phone[1];
        $contact->adress = $request->adress;
        $contact->state = $request->state;
        $contact->city = $request->city;
        $contact->cep = $request->cep;

        $contact->save();
    }

}