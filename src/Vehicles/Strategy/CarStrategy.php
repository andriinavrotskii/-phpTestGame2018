<?php

namespace TestGame\Vehicles\Strategy;


use TestGame\Vehicles\Exception\VehicleException;
use TestGame\Vehicles\Repository\CarRepositoryInterface;
use TestGame\Vehicles\Service\CarService;

class CarStrategy implements VehicleStrategyInterface
{
    /** @var CarService  */
    private $service;

    /** @var  */
    private $repository;

    /**
     * CarStrategy constructor.
     * @param CarService $service
     * @param CarRepositoryInterface $repository
     */
    public function __construct(CarService $service, CarRepositoryInterface $repository)
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
        $entity = $this->repository->getById($id);
        $this->service->move($entity);
        $this->service->musicOn($entity);
    }

}