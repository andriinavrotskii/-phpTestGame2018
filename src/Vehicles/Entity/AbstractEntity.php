<?php

namespace TestGame\Vehicles\Entity;


abstract class AbstractEntity
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $fuelLevel;

    /** @var int */
    private $status;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getFuelLevel()
    {
        return $this->fuelLevel;
    }

    /**
     * @param int $fuelLevel
     */
    public function setFuelLevel($fuelLevel)
    {
        $this->fuelLevel = $fuelLevel;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}
