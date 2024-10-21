<?php

namespace Toggenation\Passgen;

use Composer\Script\Event;

class Passgen
{
    public const DEFAULT_LENGTH = 9;

    public static function getLength(array $args): int
    {
        $length = $args && is_numeric($args[0]) ? $args[0] : self::DEFAULT_LENGTH;

        return (int) $length;
    }

    public static function generate(Event $event)
    {
        $length = self::getLength($event->getArguments());

        $factory = new \RandomLib\Factory;

        $generator = $factory->getHighStrengthGenerator();

        $pwd = $generator->generateString($length);

        echo $pwd . PHP_EOL;

        return $pwd;
    }
}
