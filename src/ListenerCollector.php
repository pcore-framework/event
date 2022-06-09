<?php

declare(strict_types=1);

namespace PCore\Event;

use PCore\Aop\Collectors\AbstractCollector;
use PCore\Event\Annotations\Listen;

/**
 * Class ListenerCollector
 * @package PCore\Event
 * @github https://github.com/pcore-framework/event
 */
class ListenerCollector extends AbstractCollector
{

    protected static array $listeners = [];

    public static function collectClass(string $class, object $attribute): void
    {
        if ($attribute instanceof Listen && !in_array($class, self::$listeners)) {
            self::$listeners[] = $class;
        }
    }

    public static function getListeners(): array
    {
        return self::$listeners;
    }

}