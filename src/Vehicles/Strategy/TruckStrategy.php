<?php

namespace TestGame\Vehicles\Strategy;

use TestGame\Vehicles\Entity\TruckInterface;
use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Repository\TruckRepositoryInterface;
use TestGame\Vehicles\Service\TruckServiceInterface;

class TruckStrategy implements VehicleStrategyInterface
{
    /** @var TruckServiceInterface  */
    private $service;

    /** @var  */
    private $repository;

    /**
     * CarStrategy constructor.
     * @param TruckServiceInterface $service
     * @param TruckRepositoryInterface $repository
     */
    public function __construct(TruckServiceInterface $service, TruckRepositoryInterface $repository)
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
        /** @var TruckInterface $entity */
        $entity = $this->repository->getById($id);

        $this->service->move($entity);
        $this->service->fullLoads($entity);
        $this->service->move($entity);
        $this->service->emptyLoads($entity);

        $this->repository->persist($entity);
    }

}