<?php

namespace TestGame\Vehicles\Entity;

interface TruckInterface extends AbstractEntityInterface
{
    const TANK_MAX_CAPACITY = 600;
    const TANK_MIN_CAPACITY = 0;
    const FUEL_CONSUMPTION = 5;
    const LOAD_MAX_CAPACITY = 10;
    const LOAD_MIN_CAPACITY = 0;

    /**
     * @return int
     */
    public function getLoadLevel();

    /**
     * @param int $loadLevel
     */
    public function setLoadLevel($loadLevel);
}