<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 13.11.18
 * Time: 11:20
 */

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\TruckInterface;

interface TruckServiceInterface extends AbstractServiceInterface
{
    public function fullLoads(TruckInterface $entity);

    public function emptyLoads(TruckInterface $entity);
}