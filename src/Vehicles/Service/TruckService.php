<?php

namespace TestGame\Vehicles\Service;


use TestGame\Vehicles\Entity\TruckInterface;
use TestGame\Vehicles\Factory\FactoryInterface;
use TestGame\Vehicles\Repository\TruckRepositoryInterface;

class TruckService extends AbstractService
{
    public function __construct(FactoryInterface $factory, TruckRepositoryInterface $repository)
    {
        parent::__construct($factory, $repository);
    }

    public function fullLoads(TruckInterface $entity)
    {
        $entity->setLoadLevel($entity::LOAD_MAX_CAPACITY);
    }

    public function emptyLoads(TruckInterface $entity)
    {
        $entity->setLoadLevel($entity::LOAD_MIN_CAPACITY);
    }

}