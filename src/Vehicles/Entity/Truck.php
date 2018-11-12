<?php

namespace TestGame\Vehicles\Entity;


class Truck extends AbstractEntity implements TruckInterface
{
    /** @var int */
    private $loadLevel;

    /**
     * @return int
     */
    public function getLoadLevel()
    {
        return $this->loadLevel;
    }

    /**
     * @param int $loadLevel
     */
    public function setLoadLevel($loadLevel)
    {
        $this->loadLevel = $loadLevel;
    }
}
