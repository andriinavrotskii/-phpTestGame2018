<?php

namespace TestGame\Application;


use TestGame\Vehicles\Service\CarServiceInterface;
use TestGame\Vehicles\Strategy\VehicleContext;

class VehiclesService
{
    /** @var VehicleContext */
    private $vehicleContext;

    public function __construct(VehicleContext $vehicleContext)
    {
        $this->vehicleContext = $vehicleContext;
    }

    /**
     * @param $id
     * @param $type
     * @return mixed
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function move($id, $type)
    {
        $strategy = $this->vehicleContext->selectStrategy($type);
        return $strategy->moveAction($id);
    }



//    /** @var ValueTypeFactory */
//    private $valueTypeFactory;

//    /** @var CarServiceInterface  */
//    private $carService;

//    /**
//     * VehiclesService constructor.
//     * @param CarServiceInterface $carService
//     */
//    public function __construct(ValueTypeFactory $valueTypeFactory)
//    {
//        $this->valueTypeFactory = $valueTypeFactory;
//    }
//
//    public function move($id, $type)
//    {
//        $typeValue = $this->valueTypeFactory->create($type);
//
//        switch ($typeValue) {
//            case
//        }
//
//
//        return $this->carService->move($id);
//    }

//    /**
//     * @param $name
//     * @return \TestGame\Vehicles\Entity\CarInterface
//     * @throws \Exception
//     */
//    public function newCar($name)
//    {
//        return $this->carService->create($name);
//    }
//
//    /**
//     * @param $id
//     * @return \TestGame\Vehicles\Entity\AbstractEntityInterface
//     */
//    public function getVehicle($id)
//    {
//        return $this->carService->getVehicle($id);
//    }


}