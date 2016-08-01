<?php

namespace AppBundle\Entity;

/**
 * milestone
 */
class milestone
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $goalId;

    /**
     * @var int
     */
    private $typeId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $percentOfGoal;

    /**
     * @var string
     */
    private $currentProgress;

    /**
     * @var int
     */
    private $target;

    /**
     * @var \DateTime
     */
    private $targetDate;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set goalId
     *
     * @param integer $goalId
     *
     * @return milestone
     */
    public function setGoalId($goalId)
    {
        $this->goalId = $goalId;

        return $this;
    }

    /**
     * Get goalId
     *
     * @return int
     */
    public function getGoalId()
    {
        return $this->goalId;
    }

    /**
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return milestone
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return milestone
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set percentOfGoal
     *
     * @param integer $percentOfGoal
     *
     * @return milestone
     */
    public function setPercentOfGoal($percentOfGoal)
    {
        $this->percentOfGoal = $percentOfGoal;

        return $this;
    }

    /**
     * Get percentOfGoal
     *
     * @return int
     */
    public function getPercentOfGoal()
    {
        return $this->percentOfGoal;
    }

    /**
     * Set currentProgress
     *
     * @param string $currentProgress
     *
     * @return milestone
     */
    public function setCurrentProgress($currentProgress)
    {
        $this->currentProgress = $currentProgress;

        return $this;
    }

    /**
     * Get currentProgress
     *
     * @return string
     */
    public function getCurrentProgress()
    {
        return $this->currentProgress;
    }

    /**
     * Set target
     *
     * @param integer $target
     *
     * @return milestone
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return int
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set targetDate
     *
     * @param \DateTime $targetDate
     *
     * @return milestone
     */
    public function setTargetDate($targetDate)
    {
        $this->targetDate = $targetDate;

        return $this;
    }

    /**
     * Get targetDate
     *
     * @return \DateTime
     */
    public function getTargetDate()
    {
        return $this->targetDate;
    }
}

