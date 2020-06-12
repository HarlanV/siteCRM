<?php
namespace App\Http\Entity;
/**
 * @Entity
 */
class ClientPhone
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
     * ManyToOne(targetEntity="ClientContact")
     */
    private $contact; //arrayCollectio, pendente

    /**
     * @column(type="string")
     */
    private $phone;

    /**
     * @column(type="string")
     */
    private $ddd;


    /**
     * Get id de identificacao do DB
     */ 
    public function getId(): Int
    {
        return $this->Id;
    }

// Methods
    /**
     * Get manyToOne(targetEntity="ClientContact")
     */ 
    public function getContact(): ClientContact
    {
        return $this->contact;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone(): String
    {
        return $this->phone;
    }

    /**
     * Get the value of ddd
     */ 
    public function getDdd(): String
    {
        return $this->ddd;
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
     * Set manyToOne(targetEntity="ClientContact")
     *
     * @return  self
     */ 
    public function setContact($contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Set the value of ddd
     *
     * @return  self
     */ 
    public function setDdd($ddd): self
    {
        $this->ddd = $ddd;

        return $this;
    }
}

