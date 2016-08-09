<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * milestone
 *
 * @ORM\Table(name="milestone")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\milestoneRepository")
 */
class milestone
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="goal_id", type="integer")
     */
    private $goalId;

    /**
     * @var integer
     *
     * @ORM\Column(name="type_id", type="integer")
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="percent_of_goal", type="integer")
     */
    private $percentOfGoal;

    /**
     * @var string
     *
     * @ORM\Column(name="current_progress", type="string", length=255)
     */
    private $currentProgress;

    /**
     * @var integer
     *
     * @ORM\Column(name="target", type="integer")
     */
    private $target;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="target_date", type="datetime")
     */
    private $targetDate;


}

