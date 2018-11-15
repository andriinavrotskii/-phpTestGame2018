<?php

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\CarInterface;

interface CarServiceInterface extends AbstractServiceInterface
{
    /**
     * @param CarInterface $entity
     */
    public function musicOn(CarInterface $entity);

    /**
     * @param CarInterface $entity
     */
    public function musicOff(CarInterface $entity);
}