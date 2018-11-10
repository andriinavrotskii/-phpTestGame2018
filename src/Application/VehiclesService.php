<?php

namespace TestGame\Application;


use TestGame\Vehicles\Factory\CarFactoryInterface;
use TestGame\Vehicles\Repository\CarRepositoryInterface;

class VehiclesService
{
    /** @var CarFactoryInterface */
    private $carFactory;

    /** @var CarRepositoryInterface */
    private $carRepository;

    public function __construct(CarFactoryInterface $carFactory, CarRepositoryInterface $carRepository)
    {
        $this->carFactory = $carFactory;
        $this->carRepository = $carRepository;
    }

    public function newCar($name)
    {
        $car = $this->carFactory->create($name);
        $this->carRepository->persist($car);

        return $car;
    }
}