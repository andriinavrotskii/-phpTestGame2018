<?php

namespace TestGame\Vehicles\Strategy;

use DI\Container;
use TestGame\Infrastructure\Adapters\DiContainer;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleActionContext
{
    /** @var Container  */
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
     * @return VehicleStrategyInterface
     */
    public function selectStrategy(VehicleType $type)
    {
        switch (true) {
            case $type->isCar():
                return $this->container->get(CarStrategy::class);
                break;
            case $type->isTruck():
                return $this->container->get(TruckStrategy::class);
                break;
        }
    }
}
