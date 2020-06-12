<?php
namespace App\Http\Entity;
/**
 * @Entity
 */
 class ClientContact
 {
// Attributes
    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $Id;

    /**
     * @ManyToOne(targetEntity="Client")
     */
    private $client; // arrayCollection, pendente
    
    /**
     * Setor da empresa que deve ser contactado. Caso não exista será inserido como "Contato Geral"
     * @column(type="string")
     */
    private $setor;
    
    /**
     * Nome da pessoa responsável por este contato. Caso não exista será colocado "Atendimento Generico"
     * @column(type="string")
     */
    private $responsavel;
    
    /**
     * Email de contato
     * @columns(type="string")
     */
    private $email;
    
    /**
     * @OneToMany(targetEntity="ClientPhone", mappedBy="contact")
     */
    private $phone; // arrayColletcion, pendente
    

// Methods

    /**
     * Set the value of Id
     *
     * @return  self
     */ 
    public function setId($Id): self
    {
        $this->Id = $Id;

        return $this;
    }

    /**
     * Set the value of client
     *
     * @return  self
     */ 
    public function setClient($client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Set setor da empresa que deve ser contactado. Caso não exista será inserido como "Contato Geral"
     *
     * @return  self
     */ 
    public function setSetor($setor): self
    {
        $this->setor = $setor;

        return $this;
    }

    /**
     * Set nome da pessoa responsável por este contato. Caso não exista será colocado "Atendimento Generico"
     *
     * @return  self
     */ 
    public function setResponsavel($responsavel): self
    {
        $this->responsavel = $responsavel;

        return $this;
    }

    /**
     * Set email de contato
     *
     * @return  self
     */ 
    public function setEmail($email): self
    {
        $this->email = $email;

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
     * Get the value of Id
     */ 
    public function getId(): int
    {
        return $this->Id;
    }

    /**
     * Get the value of client
     */ 
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Get setor da empresa que deve ser contactado. Caso não exista será inserido como "Contato Geral"
     */ 
    public function getSetor(): String
    {
        return $this->setor;
    }

    /**
     * Get nome da pessoa responsável por este contato. Caso não exista será colocado "Atendimento Generico"
     */ 
    public function getResponsavel(): String
    {
        return $this->responsavel;
    }

    /**
     * Get email de contato
     */ 
    public function getEmail(): String
    {
        return $this->email;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone(): ClientPhone
    {
        return $this->phone;
    }
 }