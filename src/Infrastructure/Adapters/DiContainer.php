<?php

namespace TestGame\Infrastructure\Adapters;

use DI\Container;
use Psr\Container\ContainerInterface;
use TestGame\Infrastructure\Exceptions\ContainerException;

class DiContainer implements ContainerInterface
{
    /** @var Container  */
    private $container;

    /**
     * DiContainer constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @return mixed|string
     * @throws ContainerException
     */
    public function get($name)
    {
        try {
            return $this->container->get($name);
        } catch (\Exception $exception) {
            throw new ContainerException('Not found: ' . $name);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name)
    {
        return $this->container->has($name);
    }

}