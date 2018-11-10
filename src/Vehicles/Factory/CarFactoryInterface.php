<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 11.11.18
 * Time: 1:12
 */

namespace TestGame\Vehicles\Factory;

use TestGame\Vehicles\Entity\CarInterface;

interface CarFactoryInterface
{
    /**
     * @param string $name
     * @return CarInterface
     * @throws \Exception
     */
    public function create($name);
}