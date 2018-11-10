<?php

namespace TestGame\Application;


use TestGame\Vehicles\Factory\CarFactoryInterface;

class VehiclesService
{
    /** @var CarFactoryInterface  */
    private $carFactory;

    public function __construct(CarFactoryInterface $carFactory)
    {
        $this->carFactory = $carFactory;
    }

    public function newCar($name)
    {
        $car = $this->carFactory->create($name);
        $this->carRepository->persist($car);

        return $car;
    }
}