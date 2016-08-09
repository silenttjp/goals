<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * name
 *
 * @ORM\Table(name="name")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\nameRepository")
 */
class name
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}

