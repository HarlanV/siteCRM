<?php
namespace App\Http\Entity;

abstract class MemberDocument
{
    private $Id;
    private $CPF;
    private $nome;
    private $RG;

    abstract function validaCPF();
    abstract function validaRG();
}

?>