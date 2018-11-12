<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\Entity\Car;
use TestGame\Vehicles\Entity\CarInterface;

class CarFactory implements FactoryInterface
{
    /**
     * @param string $name
     * @return CarInterface
     */
    public function create($name)
    {
        $entity = new Car();
        $entity->setName($name);
        $entity->setFuelLevel($entity::TANK_MAX_CAPACITY);
        $entity->setMusicStatus($entity::MUSIC_OFF);

        return $entity;
    }
}
