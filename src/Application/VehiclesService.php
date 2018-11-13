<?php

namespace TestGame\Application;

use TestGame\Vehicles\Factory\VehicleAbstractFactory;
use TestGame\Vehicles\Factory\VehicleRepositoryAbstractFactory;
use TestGame\Vehicles\Factory\VehicleTypeFactory;
use TestGame\Vehicles\Strategy\VehicleActionContext;

class VehiclesService
{
    /** @var VehicleAbstractFactory */
    private $abstractFactory;

    /** @var VehicleActionContext */
    private $actionContext;

    /** @var VehicleRepositoryAbstractFactory */
    private $repositoryAbstractFactory;

    /** @var VehicleTypeFactory */
    private $typeFactory;

    /**
     * VehiclesService constructor.
     * @param VehicleAbstractFactory $abstractFactory
     * @param VehicleRepositoryAbstractFactory $repositoryAbstractFactory
     * @param VehicleActionContext $actionContext
     * @param VehicleTypeFactory $typeFactory
     */
    public function __construct(
        VehicleAbstractFactory $abstractFactory,
        VehicleRepositoryAbstractFactory $repositoryAbstractFactory,
        VehicleActionContext $actionContext,
        VehicleTypeFactory $typeFactory
    ) {
        $this->abstractFactory = $abstractFactory;
        $this->repositoryAbstractFactory = $repositoryAbstractFactory;
        $this->actionContext = $actionContext;
        $this->typeFactory = $typeFactory;
    }

    /**
     * @param $type
     * @param $name
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function createVehicle($type, $name)
    {
        $type = $this->typeFactory->create($type);
        $entity = $this->abstractFactory->create($type, $name);
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
        $type = $this->typeFactory->create($type);
        return $this->repositoryAbstractFactory
            ->create($type)
            ->getById($id);
    }
    /**
     * @param $id
     * @param $type
     * @return mixed
     * @throws \TestGame\Vehicles\Exception\VehicleException
     */
    public function moveVehicle($id, $type)
    {
        $type = $this->typeFactory->create($type);
        $strategy = $this->actionContext->selectStrategy($type);
        return $strategy->moveAction($id);
    }
}