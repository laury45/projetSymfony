<?php

namespace Iut\PlanningBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser; 
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="utilisateurs")
 * @ORM\Entity
 */
class utilisateurs extends BaseUser 
{
	


    /**
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
}
