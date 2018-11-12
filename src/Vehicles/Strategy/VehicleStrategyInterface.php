<?php

namespace TestGame\Vehicles\Strategy;


use TestGame\Vehicles\Exception\VehicleException;

interface VehicleStrategyInterface
{
    /**
     * @param int $id
     * @throws VehicleException
     */
    public function moveAction($id);
}