<?php

namespace TestGame\Infrastructure\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class EchoLogger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = array())
    {
        echo "<p>";
        echo "{$level} {$message}";
        if (!empty($context)) {
            echo "<pre>";
            print_r($context);
            echo "</pre>";
        }
        echo "</p>";
    }

}