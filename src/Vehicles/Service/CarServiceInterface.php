<?php

namespace TestGame\Vehicles\Service;

interface CarServiceInterface
{
    /**
     * @param $name
     * @return \TestGame\Vehicles\Entity\CarInterface
     * @throws \Exception
     */
    public function newCar($name);
}