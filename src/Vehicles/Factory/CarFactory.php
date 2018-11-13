<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Entity\Car;

class CarFactory implements FactoryInterface
{
    /**
     * @param string $name
     * @return AbstractEntityInterface
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
