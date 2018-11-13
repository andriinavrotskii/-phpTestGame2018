<?php

namespace TestGame\Vehicles\Entity;

use TestGame\Vehicles\Repository\CarRepositoryInterface;

interface CarInterface extends AbstractEntityInterface
{
    const REPOSITORY_CLASS = CarRepositoryInterface::class;

    const TANK_MAX_CAPACITY = 60;
    const TANK_MIN_CAPACITY = 0;
    const FUEL_CONSUMPTION = 5;
    const MUSIC_ON = 1;
    const MUSIC_OFF = 0;

    /**
     * @return int
     */
    public function getMusicStatus();

    /**
     * @param int $musicStatus
     */
    public function setMusicStatus($musicStatus);
}
