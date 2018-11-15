<?php

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\TruckInterface;

interface TruckServiceInterface extends AbstractServiceInterface
{
    public function fullLoads(TruckInterface $entity);

    public function emptyLoads(TruckInterface $entity);
}