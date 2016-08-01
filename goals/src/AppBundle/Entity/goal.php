<?php

namespace AppBundle\Entity;

/**
 * goal
 */
class goal
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $dateStart;

    /**
     * @var \DateTime
     */
    private $dateCompleted;

    /**
     * @var \DateTime
     */
    private $targetDateComplete;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return goal
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return goal
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
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return goal
     */
    public function setDateStart($dateStart)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateCompleted
     *
     * @param \DateTime $dateCompleted
     *
     * @return goal
     */
    public function setDateCompleted($dateCompleted)
    {
        $this->dateCompleted = $dateCompleted;

        return $this;
    }

    /**
     * Get dateCompleted
     *
     * @return \DateTime
     */
    public function getDateCompleted()
    {
        return $this->dateCompleted;
    }

    /**
     * Set targetDateComplete
     *
     * @param \DateTime $targetDateComplete
     *
     * @return goal
     */
    public function setTargetDateComplete($targetDateComplete)
    {
        $this->targetDateComplete = $targetDateComplete;

        return $this;
    }

    /**
     * Get targetDateComplete
     *
     * @return \DateTime
     */
    public function getTargetDateComplete()
    {
        return $this->targetDateComplete;
    }
}

