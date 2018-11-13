<?php

namespace TestGame\Vehicles\Factory;

use TestGame\Vehicles\Entity\AbstractEntityInterface;

interface FactoryInterface
{
    /**
     * @param string $name
     * @return AbstractEntityInterface
     */
    public function create($name);
}