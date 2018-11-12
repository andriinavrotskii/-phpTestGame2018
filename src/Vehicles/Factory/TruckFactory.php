<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\Entity\Truck;

class TruckFactory implements FactoryInterface
{

    public function create($name)
    {
        $entity = new Truck();
        $entity->setName($name);
        $entity->setFuelLevel($entity::TANK_MAX_CAPACITY);
        $entity->setLoadLevel($entity::LOAD_MIN_CAPACITY);

        return $entity;
    }
}
