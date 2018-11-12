<?php

namespace TestGame\Vehicles\Entity;


class Car extends AbstractEntity implements CarInterface
{

    /** @var int */
    private $musicStatus;

    /**
     * @return int
     */
    public function getMusicStatus()
    {
        return $this->musicStatus;
    }

    /**
     * @param int $musicStatus
     */
    public function setMusicStatus($musicStatus)
    {
        $this->musicStatus = $musicStatus;
    }
}