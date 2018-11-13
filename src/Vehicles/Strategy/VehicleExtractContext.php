<?php

namespace TestGame\Vehicles\Strategy;

use TestGame\Infrastructure\Adapters\DiContainer;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Repository\CarRepositoryInterface;
use TestGame\Vehicles\Repository\RepositoryInterface;
use TestGame\Vehicles\Repository\TruckRepositoryInterface;
use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleExtractContext
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
     * @return RepositoryInterface
     * @throws VehicleException
     */
    public function selectStrategy(VehicleType $type)
    {
        try {
            switch (true) {
                case $type->isCar():
                    return $this->container->get(CarRepositoryInterface::class);
                    break;
                case $type->isTruck():
                    return $this->container->get(TruckRepositoryInterface::class);
                    break;
                default:
                    throw new VehicleException();
            }
        } catch (\Exception $exception) {
            throw new VehicleException('Unexist Vehicle type');
        }
    }
}