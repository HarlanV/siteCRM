<?php
namespace App\Http\Models;

class Membro
{
    /** Atributos básicos  */
    private $name;
    private $documentos;
    private $endereço;
    private $senha;


// GETERS AND SETERS
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of documentos
     */ 
    private function getDocumentos()
    {
        return $this->documentos;
    }

    /**
     * Set the value of documentos
     *
     * @return  self
     */ 
    public function setDocumentos($documentos)
    {
        $this->documentos = $documentos;

        return $this;
    }

    /**
     * Get the value of endereço
     */ 
    public function getEndereço()
    {
        return $this->endereço;
    }

    /**
     * Set the value of endereço
     *
     * @return  self
     */ 
    public function setEndereço($endereço)
    {
        $this->endereço = $endereço;

        return $this;
    }

    /**
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }


// METHODS

    public function consultaDoctumento()
    {
        // espaço reservado para criar metodo de consulta documentos com devidas restrições
    }

    
}
?>