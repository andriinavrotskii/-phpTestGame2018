<?php

namespace TestGame\Vehicles\Strategy;


use DI\Container;
use TestGame\Infrastructure\Adapters\DiContainer;
use TestGame\Vehicles\Exception\VehicleException;

class VehicleContext
{
    const TRUCK = 'truck';
    const CAR = 'car';

    /** @var Container  */
    private $container;

    /**
     * VehicleContext constructor.
     * @param Container $container
     */
    public function __construct(DiContainer $container)
    {
        $this->container = $container;
    }

    /**
     * @param $type
     * @return VehicleStrategyInterface
     * @throws VehicleException
     */
    public function selectStrategy($type)
    {
        try {
            switch ($type) {
                case self::CAR:
                    return $this->container->get(CarStrategy::class);
                    break;
                case self::TRUCK:
                    return $this->container->get(TruckStrategy::class);
                    break;
                default:
                    throw new VehicleException();
            }
        } catch (\Exception $exception) {
            throw new VehicleException('Unexist Vehicle type');
        }
    }
}
