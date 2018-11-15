<?php

namespace TestGame\Vehicles\Service;


use Psr\Log\LoggerInterface;
use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Factory\FactoryInterface;
use TestGame\Vehicles\Repository\RepositoryInterface;

abstract class AbstractService implements AbstractServiceInterface
{
    /** @var LoggerInterface */
    protected $logger;

    /** @var FactoryInterface */
    protected $factory;

    /** @var RepositoryInterface */
    protected $repository;

    /**
     * AbstractService constructor.
     * @param LoggerInterface $logger
     * @param FactoryInterface $factory
     * @param RepositoryInterface $repository
     */
    public function __construct(LoggerInterface $logger, FactoryInterface $factory, RepositoryInterface $repository)
    {
        $this->logger = $logger;
        $this->factory = $factory;
        $this->repository = $repository;
    }

    /**
     * @param $name
     * @return AbstractEntityInterface
     * @throws \Exception
     */
    public function create($name)
    {
        $entity = $this->factory->create($name);
        $this->repository->persist($entity);
        $this->logger->info("{$name} created");

        return $entity;
    }

    /**
     * @param int $id
     * @return AbstractEntityInterface
     */
    public function getVehicle($id)
    {
        return $this->repository->getById($id);
    }

    /**
     * @param AbstractEntityInterface $entity
     * @throws VehicleException
     */
    public function move(AbstractEntityInterface $entity)
    {
        $this->engineWork($entity);
        $this->repository->persist($entity);
        $this->logger->info("The {$entity->getName()} is moved");
    }

    /**
     * @param AbstractEntityInterface $entity
     * @throws VehicleException
     */
    protected function engineWork(AbstractEntityInterface $entity)
    {
        if ($entity->getFuelLevel() == 0) {
            $this->logger->alert("The {$entity->getName()} run out of fuel");
            throw new VehicleException('Out of Fuel');
        }
        $entity->setFuelLevel($entity->getFuelLevel() - $entity::FUEL_CONSUMPTION);
    }
}