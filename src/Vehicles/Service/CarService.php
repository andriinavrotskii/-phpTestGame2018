<?php

namespace TestGame\Vehicles\Service;

use Psr\Log\LoggerInterface;
use TestGame\Vehicles\Entity\CarInterface;
use TestGame\Vehicles\Factory\CarFactoryInterface;
use TestGame\Vehicles\Repository\CarRepositoryInterface;

class CarService extends AbstractService implements CarServiceInterface
{
    public function __construct(
        LoggerInterface $logger,
        CarFactoryInterface $factory,
        CarRepositoryInterface $repository
    ) {
        parent::__construct($logger, $factory, $repository);
    }

    /**
     * @param CarInterface $entity
     */
    public function musicOn(CarInterface $entity)
    {
        if ($entity->getMusicStatus() === $entity::MUSIC_ON) {
            return;
        }
        $entity->setMusicStatus($entity::MUSIC_ON);
        $this->logger->info("Music is turned on in the {$entity->getName()}");
    }

    /**
     * @param CarInterface $entity
     */
    public function musicOff(CarInterface $entity)
    {
        if ($entity->getMusicStatus() === $entity::MUSIC_OFF) {
            return;
        }
        $entity->setMusicStatus($entity::MUSIC_OFF);
        $this->logger->info("Music is turned off in the {$entity->getName()}");
    }
}