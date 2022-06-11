<?php

declare(strict_types=1);

namespace PCore\Event;

/**
 * Class ConfigProvider
 * @package PCore\Event
 * @github https://github.com/pcore-framework/event
 */
class ConfigProvider
{

    public function __invoke()
    {
        return [
            'bindings' => [
                'Psr\EventDispatcher\ListenerProviderInterface' => 'PCore\Event\ListenerProvider',
                'Psr\EventDispatcher\EventDispatcherInterface' => 'PCore\Event\EventDispatcher',
                'PCore\Event\Contracts\EventDispatcherInterface' => 'PCore\Event\EventDispatcher'
            ]
        ];
    }

}