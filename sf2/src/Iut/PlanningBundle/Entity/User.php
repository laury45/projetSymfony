<?php

namespace Iut\PlanningBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser; 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity
 */
class User extends BaseUser 
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
}
