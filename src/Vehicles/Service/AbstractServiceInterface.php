<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 13.11.18
 * Time: 11:03
 */

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\AbstractEntityInterface;
use TestGame\Vehicles\Exception\VehicleException;

interface AbstractServiceInterface
{
    /**
     * @param $name
     * @return AbstractEntityInterface
     * @throws \Exception
     */
    public function create($name);

    /**
     * @param int $id
     * @return AbstractEntityInterface
     */
    public function getVehicle($id);

    /**
     * @param AbstractEntityInterface $entity
     * @throws VehicleException
     */
    public function move(AbstractEntityInterface $entity);
}