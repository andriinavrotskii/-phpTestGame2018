<?php

namespace TestGame\Vehicles\ValueObjects;


use TestGame\Vehicles\Exception\VehicleException;

class VehicleType
{
    const TRUCK = 'truck';
    const CAR = 'car';

    /** @var string */
    private $type;

    /**
     * VehicleType constructor.
     * @param string $type
     * @throws VehicleException
     */
    public function __construct($type)
    {
        $this->setType($type);
    }

    /**
     * @param $type
     * @throws VehicleException
     */
    private function setType($type)
    {
        switch ($type) {
            case self::CAR:
                $this->type = self::CAR;
                break;
            case self::TRUCK:
                $this->type = self::TRUCK;
                break;
            default:
                throw new VehicleException('Unexist Vehicle type');
        }
    }
}