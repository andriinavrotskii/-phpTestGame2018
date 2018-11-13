<?php

namespace TestGame\Application;

use TestGame\Vehicles\Factory\VehicleAbstractFactory;
use TestGame\Vehicles\Factory\VehicleTypeFactory;
use TestGame\Vehicles\Strategy\VehicleActionContext;
use TestGame\Vehicles\Strategy\VehicleCreateContext;
use TestGame\Vehicles\Strategy\VehicleExtractContext;

class VehiclesService
{
    /** @var VehicleAbstractFactory */
    private $vehicleAbstractFactory;

    /** @var VehicleActionContext */
    private $vehicleActionContext;

    /** @var VehicleExtractContext */
    private $vehicleExtractContext;

    /** @var VehicleTypeFactory */
    private $vehicleTypeFactory;

    /**
     * VehiclesService constructor.
     * @param VehicleAbstractFactory $vehicleAbstractFactory
     * @param VehicleActionContext $vehicleActionContext
     * @param VehicleExtractContext $vehicleExtractContext
     * @param VehicleTypeFactory $vehicleTypeFactory
     */
    public function __construct(
        VehicleAbstractFactory $vehicleAbstractFactory,
        VehicleActionContext $vehicleActionContext,
        VehicleExtractContext $vehicleExtractContext,
        VehicleTypeFactory $vehicleTypeFactory
    ) {
        $this->vehicleAbstractFactory = $vehicleAbstractFactory;
        $this->vehicleActionContext = $vehicleActionContext;
        $this->vehicleExtractContext = $vehicleExtractContext;
        $this->vehicleTypeFactory = $vehicleTypeFactory;
    }

    /**
     * @param $type
     * @param $name
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function createVehicle($type, $name)
    {
        $type = $this->vehicleTypeFactory->create($type);
        $entity = $this->vehicleAbstractFactory->create($type, $name);
        $entity->getRepository()->persist($entity);
    }

    /**
     * @param $id
     * @param $type
     * @return \TestGame\Vehicles\Entity\AbstractEntityInterface
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function getVehicle($id, $type)
    {
        $type = $this->vehicleTypeFactory->create($type);
        return $this->vehicleExtractContext->selectStrategy($type)->getById($id);
    }
    /**
     * @param $id
     * @param $type
     * @return mixed
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function moveVehicle($id, $type)
    {
        $type = $this->vehicleTypeFactory->create($type);
        $strategy = $this->vehicleActionContext->selectStrategy($type);
        return $strategy->moveAction($id);
    }
}