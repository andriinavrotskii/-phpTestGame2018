<?php

namespace TestGame\Vehicles\Repository;

use TestGame\Vehicles\Entity\AbstractEntityInterface;

interface RepositoryInterface
{
    /**
     * @param int $id
     * @return AbstractEntityInterface
     */
    public function getById($id);

    /**
     * @return AbstractEntityInterface[]
     */
    public function getAll();

    /**
     * @param AbstractEntityInterface $entity
     * @return void
     */
    public function persist(AbstractEntityInterface $entity);
}