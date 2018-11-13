<?php

namespace TestGame\Vehicles\Factory;

use Psr\Container\ContainerInterface;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\ValueObjects\VehicleType;

class VehicleAbstractFactory
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
     * @param $name
     * @return \TestGame\Vehicles\Entity\AbstractEntityInterface
     * @throws VehicleException
     */
    public function create(VehicleType $type, $name)
    {
        return $this->selectFactory($type)
            ->create($name);
    }

    /**
     * @param VehicleType $type
     * @return FactoryInterface
     * @throws VehicleException
     */
    private function selectFactory(VehicleType $type)
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
