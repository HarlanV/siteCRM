<?php
namespace App\Http\Models;

abstract class DocumentosPF
{
    private $CPF;
    private $nome;
    private $RG;


    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of CPF
     */ 
    public function getCPF()
    {
        return $this->CPF;
    }

    /**
     * Set the value of CPF
     *
     * @return  self
     */ 
    public function setCPF($CPF)
    {
        $this->CPF = $CPF;

        return $this;
    }

    /**
     * Get the value of RG
     */ 
    public function getRG()
    {
        return $this->RG;
    }

    /**
     * Set the value of RG
     *
     * @return  self
     */ 
    public function setRG($RG)
    {
        $this->RG = $RG;

        return $this;
    }
}



?>