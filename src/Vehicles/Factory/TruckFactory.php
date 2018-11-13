<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Entity\Truck;

class TruckFactory implements FactoryInterface, TruckFactoryInterface
{
    /**
     * @param string $name
     * @return AbstractEntityInterface
     */
    public function create($name)
    {
        $entity = new Truck();
        $entity->setName($name);
        $entity->setFuelLevel($entity::TANK_MAX_CAPACITY);
        $entity->setLoadLevel($entity::LOAD_MIN_CAPACITY);

        return $entity;
    }
}
