<?php
namespace App\services;

use App\Member;
use App\MemberContact;
use App\MemberDocument;
use Illuminate\Support\Facades\DB;

class MemberDeleter
{
    /**
     * Metodo para deleção de Membros
     * 
     * @param   int  $memberId
     * @return  string  $name
     */
    public function memberDelete(int $memberId)
    {
        DB::beginTransaction();
            
            $member = Member::find($memberId);
            $name = $member->name;
            $this->documentDelete($member);
            $this->contactDelete($member);
            $member->delete();

        DB::commit();
        return $name;
    }

    /**
     * Metodo complementar para deletear Members em cascata.
     * 
     * @param   \App\Member  $member
     * @return  void
     */
    protected function documentDelete($member): void
    {

        $member->MemberDocuments()->each(function (MemberDocument $memberDocument)
        {
            $memberDocument->delete();
        }); 
    }

    /**
     * Metodo complementar para deletear Members em cascata.
     * 
     * @param   \App\Member  $member
     * @return  void
     */
    protected function contactDelete($member): void
    {

        $member->MemberContacts()->each(function (MemberContact $memberContact)
        {
            $memberContact->delete();
        });
    }
}