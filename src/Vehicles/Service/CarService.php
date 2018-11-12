<?php

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\CarInterface;
use TestGame\Vehicles\Factory\CarFactoryInterface;
use TestGame\Vehicles\Repository\CarRepositoryInterface;

class CarService extends AbstractService
{
    public function __construct(CarFactoryInterface $factory, CarRepositoryInterface $repository)
    {
        parent::__construct($factory, $repository);
    }

    /**
     * @param CarInterface $entity
     */
    public function musicOn(CarInterface $entity)
    {
        $entity->setMusicStatus($entity::MUSIC_ON);
    }

    /**
     * @param CarInterface $entity
     */
    public function musicOff(CarInterface $entity)
    {
        $entity->setMusicStatus($entity::MUSIC_OFF);
    }
}