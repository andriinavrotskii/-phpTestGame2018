<?php

namespace TestGame\Infrastructure\Repository;

use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Repository\RepositoryInterface;

abstract class AbstractRepository implements RepositoryInterface
{
    public function getById($id)
    {
        // TODO: Implement getById() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function persist(AbstractEntityInterface $entity)
    {
        // TODO: Implement persist() method.
    }

}