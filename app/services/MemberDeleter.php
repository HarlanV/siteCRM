<?php
namespace App\services;

use App\Member;
use App\MemberContact;
use App\MemberRegister;
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
            $this->registerDelete($member);
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
    protected function registerDelete($member): void
    {

        $member->MemberRegisters->each(function (MemberRegister $memberRegister)
        {
            $memberRegister->delete();
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
        $member->MemberContacts->each(function (MemberContact $memberContact)
        {
            $memberContact->delete();
        });
    }
}