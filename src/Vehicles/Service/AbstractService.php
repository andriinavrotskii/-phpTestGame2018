<?php

namespace TestGame\Vehicles\Service;


use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Factory\FactoryInterface;
use TestGame\Vehicles\Repository\RepositoryInterface;

abstract class AbstractService
{
    /** @var FactoryInterface */
    protected $factory;

    /** @var RepositoryInterface */
    protected $repository;

    /**
     * AbstractService constructor.
     * @param FactoryInterface $factory
     * @param RepositoryInterface $repository
     */
    public function __construct(FactoryInterface $factory, RepositoryInterface $repository)
    {
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
     * @throws \Exception
     */
    public function move(AbstractEntityInterface $entity)
    {
        $this->engineWork($entity);
        $this->repository->persist($entity);
    }

    /**
     * @param AbstractEntityInterface $entity
     * @throws \Exception
     */
    protected function engineWork(AbstractEntityInterface $entity)
    {
        if ($entity->getFuelLevel() == 0) {
            throw new \Exception('Out of Fuel');
        }
        $entity->setFuelLevel($entity->getFuelLevel() - $entity->getFuelConsumptionPerAct());
    }
}