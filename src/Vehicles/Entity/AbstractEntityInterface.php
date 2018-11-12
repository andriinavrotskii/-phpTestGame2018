<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 11.11.18
 * Time: 23:51
 */

namespace TestGame\Vehicles\Entity;

interface AbstractEntityInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @param int $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     */
    public function setName($name);

    /**
     * @return int
     */
    public function getFuelLevel();

    /**
     * @param int $fuelLevel
     */
    public function setFuelLevel($fuelLevel);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param int $status
     */
    public function setStatus($status);
}