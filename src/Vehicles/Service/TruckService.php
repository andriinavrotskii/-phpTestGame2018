<?php

namespace TestGame\Vehicles\Service;

use Psr\Log\LoggerInterface;
use TestGame\Vehicles\Entity\TruckInterface;
use TestGame\Vehicles\Factory\FactoryInterface;
use TestGame\Vehicles\Repository\TruckRepositoryInterface;

class TruckService extends AbstractService implements TruckServiceInterface
{
    public function __construct(
        LoggerInterface $logger,
        FactoryInterface $factory,
        TruckRepositoryInterface $repository
    ) {
        parent::__construct($logger, $factory, $repository);
    }

    public function fullLoads(TruckInterface $entity)
    {
        $entity->setLoadLevel($entity::LOAD_MAX_CAPACITY);
        $this->logger->info("The {$entity->getName()} is fully loaded");
    }

    public function emptyLoads(TruckInterface $entity)
    {
        $entity->setLoadLevel($entity::LOAD_MIN_CAPACITY);
        $this->logger->info("The {$entity->getName()} unloaded");
    }

}