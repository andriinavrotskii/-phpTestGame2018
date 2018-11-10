<?php

namespace TestGame\Vehicles\Entity;

interface AbstractEntityInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return float
     */
    public function getTankCapacity();

    /**
     * @param float $tankCapacity
     */
    public function setTankCapacity($tankCapacity);

    /**
     * @return float
     */
    public function getFuelConsumptionPerClick();

    /**
     * @param float $fuelConsumptionPerClick
     */
    public function setFuelConsumptionPerClick($fuelConsumptionPerClick);
}