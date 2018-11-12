<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\ValueObjects\VehicleType;

class ValueTypeFactory implements FactoryInterface
{
    public function create($name)
    {
        return new VehicleType($name);
    }
}