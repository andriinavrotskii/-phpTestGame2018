<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 13.11.18
 * Time: 11:20
 */

namespace TestGame\Vehicles\Service;

use TestGame\Vehicles\Entity\CarInterface;

interface CarServiceInterface extends AbstractServiceInterface
{
    /**
     * @param CarInterface $entity
     */
    public function musicOn(CarInterface $entity);

    /**
     * @param CarInterface $entity
     */
    public function musicOff(CarInterface $entity);
}