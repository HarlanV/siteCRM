<?php
namespace App\Http\Models;

abstract class DocumentsModel
{
    private $CPF;
    private $nome;
    private $RG;

    abstract function validaCPF();
    abstract function validaRG();
}

?>