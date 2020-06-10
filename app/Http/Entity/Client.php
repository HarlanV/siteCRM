<?php
namespace App\Http\Entity;
/**
 * @Entity
 */

class Client
{
// Attributes
    /**
     * id de identificacao do DB
     * @Id
     * @GenereatedVAlue
     * @column (type="integer")
     */
    private Int $Id;

    /**
     * nome fantasia da empresa
     * @column(type="string")
     */
    private $name;

    /**
     * Razao social da empresa
     * @column(type="string")
     */
    private $razao;

    /**
     * Endereço da empresa
     * @column(type="string")
     */
    private $adress;

    /**
     * OneToMany(targetEntity="ClientContact", mappedBy="client")
     */
    private $contact; //arrayCollection

    /**
     * CNPJ da empresa. Campo não obrigatorio
     * @column(type="string")
     */
    private $cnpj;

// Methods

    /**
     * Get id de identificacao do DB
     */ 
    public function getId(): Int
    {
        return $this->Id;
    }

    /**
     * Set id de identificacao do DB
     *
     * @return  self
     */ 
    public function setId($Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Get nome fantasia da empresa
     */ 
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * Set nome fantasia da empresa
     *
     * @return  self
     */ 
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get razao social da empresa
     */ 
    public function getRazao(): String
    {
        return $this->razao;
    }

    /**
     * Set razao social da empresa
     *
     * @return  self
     */ 
    public function setRazao($razao): self
    {
        $this->razao = $razao;

        return $this;
    }

    /**
     * Get endereço da empresa
     */ 
    public function getAdress(): String
    {
        return $this->adress;
    }

    /**
     * Set endereço da empresa
     *
     * @return  self
     */ 
    public function setAdress($adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get oneToMany(targetEntity="ClientContact", mappedBy="client")
     */ 
    public function getContact(): ClientContact
    {
        return $this->contact;
    }

    /**
     * Set oneToMany(targetEntity="ClientContact", mappedBy="client")
     *
     * @return  self
     */ 
    public function setContact($contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get cNPJ da empresa. Campo não obrigatorio
     */ 
    public function getCnpj(): String
    {
        return $this->cnpj;
    }

    /**
     * Set cNPJ da empresa. Campo não obrigatorio
     *
     * @return  self
     */ 
    public function setCnpj($cnpj): self
    {
        $this->cnpj = $cnpj;

        return $this;
    }
}