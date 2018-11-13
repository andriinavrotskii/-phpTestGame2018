<?php

namespace TestGame\Application;

use TestGame\Vehicles\Factory\VehicleTypeFactory;
use TestGame\Vehicles\Strategy\VehicleActionContext;
use TestGame\Vehicles\Strategy\VehicleCreateContext;
use TestGame\Vehicles\Strategy\VehicleExtractContext;

class VehiclesService
{
    /** @var VehicleCreateContext */
    private $vehicleCreateContext;

    /** @var VehicleActionContext */
    private $vehicleActionContext;

    /** @var VehicleExtractContext */
    private $vehicleExtractContext;

    /** @var VehicleTypeFactory */
    private $vehicleTypeFactory;

    public function __construct(
        VehicleCreateContext $vehicleCreateContext,
        VehicleActionContext $vehicleActionContext,
        VehicleExtractContext $vehicleExtractContext,
        VehicleTypeFactory $vehicleTypeFactory
    ) {
        $this->vehicleCreateContext = $vehicleCreateContext;
        $this->vehicleActionContext = $vehicleActionContext;
        $this->vehicleExtractContext = $vehicleExtractContext;
        $this->vehicleTypeFactory = $vehicleTypeFactory;
    }

    /**
     * @param $type
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function createVehicle($type)
    {
        $type = $this->vehicleTypeFactory->create($type);
        $entity = $this->vehicleCreateContext->selectStrategy($type)->create($type);
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