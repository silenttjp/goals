<?php

namespace AppBundle\Entity;

/**
 * milestone_history
 */
class milestone_history
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $milestoneId;

    /**
     * @var int
     */
    private $value;

    /**
     * @var \DateTime
     */
    private $timestamp;


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
     * Set milestoneId
     *
     * @param integer $milestoneId
     *
     * @return milestone_history
     */
    public function setMilestoneId($milestoneId)
    {
        $this->milestoneId = $milestoneId;

        return $this;
    }

    /**
     * Get milestoneId
     *
     * @return int
     */
    public function getMilestoneId()
    {
        return $this->milestoneId;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return milestone_history
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     *
     * @return milestone_history
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }
}

