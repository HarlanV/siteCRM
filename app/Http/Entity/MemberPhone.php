<?php
namespace App\Http\Entity;
/**
 * @Entity
 */
class MemberPhone{

    /**
     * id de identificacao do DB
     * @Id
     * @GenereatedVAlue
     * @column (type="integer")
     */
    private Int $Id;

   /**
     * ManyToOne(targetEntity="Member")
     */
    private $contact; //arrayCollection 
}

