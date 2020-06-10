<?php
namespace App\Http\Entity;
/**
 * @Entity */

class Member
{
    private $Id;
    private $login;
    private $password;
    private $name;
    private $role; // cargo
    private $documents;


   /**
     * @OneToMany(targetEntity="ClientPhone")
     */
    private $phone;
    
        
    /**
     * Email de contato
     * @columns(type="string")
     */
    private $primaryEmail;

        
    /**
     * Email de contato
     * @columns(type="string")
     */
    private $secondaryEmail;

}