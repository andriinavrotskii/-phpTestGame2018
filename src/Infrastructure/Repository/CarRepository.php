<?php

namespace TestGame\Infrastructure\Repository;

use TestGame\Vehicles\Repository\CarRepositoryInterface;

class CarRepository implements CarRepositoryInterface
{
    use RepositoryTrait;
}