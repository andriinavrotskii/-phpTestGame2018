<?php

namespace TestGame\Vehicles\Factory;

use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleTypeFactory implements FactoryInterface
{
    /**
     * @param string $type
     * @return \TestGame\Vehicles\Entity\CarInterface|VehicleType
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function create($type)
    {
        return new VehicleType($type);
    }
}