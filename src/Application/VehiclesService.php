<?php

namespace TestGame\Application;


use TestGame\Vehicles\Service\CarServiceInterface;

class VehiclesService
{
    /** @var CarServiceInterface  */
    private $carService;

    /**
     * VehiclesService constructor.
     * @param CarServiceInterface $carService
     */
    public function __construct(CarServiceInterface $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @param $name
     * @return \TestGame\Vehicles\Entity\CarInterface
     * @throws \Exception
     */
    public function newCar($name)
    {
        return $this->carService->create($name);
    }

    /**
     * @param $id
     * @return \TestGame\Vehicles\Entity\AbstractEntityInterface
     */
    public function getVehicle($id)
    {
        return $this->carService->getVehicle($id);
    }

    public function move($id)
    {
        return $this->carService->move($id);
    }
}