<?php

namespace TestGame\Vehicles\Entity;

use TestGame\Vehicles\Repository\TruckRepositoryInterface;

interface TruckInterface extends AbstractEntityInterface
{
    const REPOSITORY_CLASS = TruckRepositoryInterface::class;

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