<?php

namespace TestGame\Vehicles\Factory;


use TestGame\Vehicles\Entity\Car;
use TestGame\Vehicles\Entity\CarInterface;
use TestGame\Vehicles\Exceptions\FactoryException;

class CarFactory implements CarFactoryInterface
{
    const BMW = 'bmw';
    const SMART = 'smart';

    /**
     * @param string $name
     * @return CarInterface
     * @throws \Exception
     */
    public function create($name)
    {
        switch ($name) {
            case self::BMW:
                return $this->createBmw();
                break;
            case self::SMART:
                return $this->createSmart();
                break;
            default:
                throw new FactoryException('Non-existent Car name');
        }
    }

    /**
     * @return CarInterface
     */
    private function createBmw()
    {
        $car = new Car();
        $car->setName('bmw');
        $car->setTankCapacity(60.0);
        $car->setFuelConsumptionPerClick(15.0);

        return $car;
    }

    /**
     * @return CarInterface
     */
    private function createSmart()
    {
        $car = new Car();
        $car->setName('smart');
        $car->setTankCapacity(30.0);
        $car->setFuelConsumptionPerClick(3.5);

        return $car;
    }
}