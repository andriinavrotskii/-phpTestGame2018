<?php

namespace TestGame\Vehicles\Factory;

use Psr\Container\ContainerInterface;
use TestGame\Vehicles\Repository\CarRepositoryInterface;
use TestGame\Vehicles\Repository\RepositoryInterface;
use TestGame\Vehicles\Repository\TruckRepositoryInterface;
use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleRepositoryAbstractFactory
{
    /** @var ContainerInterface  */
    private $container;

    /**
     * VehicleContext constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param VehicleType $type
     * @return RepositoryInterface
     */
    public function create(VehicleType $type)
    {
        return $this->selectRepository($type);
    }

    /**
     * @param VehicleType $type
     * @return RepositoryInterface
     */
    public function selectRepository(VehicleType $type)
    {
        switch (true) {
            case $type->isCar():
                return $this->container->get(CarRepositoryInterface::class);
                break;
            case $type->isTruck():
                return $this->container->get(TruckRepositoryInterface::class);
                break;
        }
    }


}