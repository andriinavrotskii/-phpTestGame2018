<?php

namespace TestGame\Vehicles\Entity;


abstract class AbstractEntity implements AbstractEntityInterface
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var float */
    private $tankCapacity;

    /** @var float */
    private $fuelConsumptionPerClick;

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
     * @return float
     */
    public function getTankCapacity()
    {
        return $this->tankCapacity;
    }

    /**
     * @param float $tankCapacity
     */
    public function setTankCapacity($tankCapacity)
    {
        $this->tankCapacity = $tankCapacity;
    }

    /**
     * @return float
     */
    public function getFuelConsumptionPerClick()
    {
        return $this->fuelConsumptionPerClick;
    }

    /**
     * @param float $fuelConsumptionPerClick
     */
    public function setFuelConsumptionPerClick($fuelConsumptionPerClick)
    {
        $this->fuelConsumptionPerClick = $fuelConsumptionPerClick;
    }
}