<?php

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Factory\CarFactoryInterface;
use TestGame\Vehicles\Repository\CarRepositoryInterface;

class CarService implements CarServiceInterface
{
    /** @var CarFactoryInterface */
    private $factory;

    /** @var CarRepositoryInterface */
    private $repository;

    /**
     * CarService constructor.
     * @param CarFactoryInterface $carFactory
     * @param CarRepositoryInterface $carRepository
     */
    public function __construct(CarFactoryInterface $carFactory, CarRepositoryInterface $carRepository)
    {
        $this->factory = $carFactory;
        $this->repository = $carRepository;
    }

    /**
     * @param $name
     * @return \TestGame\Vehicles\Entity\CarInterface
     * @throws \Exception
     */
    public function newCar($name)
    {
        $car = $this->factory->create($name);
        $this->repository->persist($car);

        return $car;
    }
}