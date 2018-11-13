<?php

namespace TestGame\Vehicles\Strategy;

use TestGame\Infrastructure\Adapters\DiContainer;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Factory\CarFactoryInterface;
use TestGame\Vehicles\Factory\FactoryInterface;
use TestGame\Vehicles\Factory\TruckFactoryInterface;
use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleCreateContext
{
    /** @var DiContainer  */
    private $container;

    /**
     * VehicleContext constructor.
     * @param DiContainer $container
     */
    public function __construct(DiContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @param VehicleType $type
     * @return FactoryInterface
     * @throws VehicleException
     */
    public function selectStrategy(VehicleType $type)
    {
        try {
            switch (true) {
                case $type->isCar():
                    return $this->container->get(CarFactoryInterface::class);
                    break;
                case $type->isTruck():
                    return $this->container->get(TruckFactoryInterface::class);
                    break;
                default:
                    throw new VehicleException();
            }
        } catch (\Exception $exception) {
            throw new VehicleException('Unexist Vehicle type');
        }
    }
}