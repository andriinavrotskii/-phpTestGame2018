<?php

namespace Test;

class VehiclesServiceTest extends \PHPUnit\Framework\TestCase
{
    const CAR = 'car';

    public $vehicleType;

    public function testVehicleTypeFactory()
    {
        $car = $this->createMock(\TestGame\Vehicles\Entity\CarInterface::class);

        $factory = $this->createMock(\TestGame\Vehicles\Factory\VehicleTypeFactory::class);
        $factory->expects($this->any())
            ->method('create')
            ->with(self::CAR)
            ->willReturn($car);

        $this->assertSame(
            $car,
            $factory->create(self::CAR)
        );
    }
}