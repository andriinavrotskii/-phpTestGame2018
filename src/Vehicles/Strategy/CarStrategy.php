<?php

namespace TestGame\Vehicles\Strategy;

use TestGame\Vehicles\Entity\CarInterface;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Repository\CarRepositoryInterface;
use TestGame\Vehicles\Service\CarServiceInterface;

class CarStrategy implements VehicleStrategyInterface, CarStrategyInterface
{
    /** @var CarServiceInterface */
    private $service;

    /** @var  */
    private $repository;

    /**
     * CarStrategy constructor.
     * @param CarServiceInterface $service
     * @param CarRepositoryInterface $repository
     */
    public function __construct(CarServiceInterface $service, CarRepositoryInterface $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @throws VehicleException
     */
    public function moveAction($id)
    {
        /** @var CarInterface $entity */
        $entity = $this->repository->getById($id);

        $this->service->move($entity);
        $this->service->musicOn($entity);

        $this->repository->persist($entity);
    }

}