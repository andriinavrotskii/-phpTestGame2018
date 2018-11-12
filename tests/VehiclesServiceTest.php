<?php

class VehiclesServiceTest extends \PHPUnit\Framework\TestCase
{
    public function testCreateCar()
    {
        $car = $this->createMock(\TestGame\Vehicles\Entity\Car::class);

        $carService = $this->createMock(\TestGame\Vehicles\Service\CarServiceInterface::class);
        $carService->expects($this->once())
            ->method('create')
            ->willReturn($car);

        $service = new \TestGame\Application\VehiclesService($carService);

        $this->assertSame(
            $car,
            $service->newCar('bmw')
        );
    }
}