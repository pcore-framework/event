<?php

declare(strict_types=1);

namespace PCore\Event;

use PCore\Event\Contracts\EventDispatcherInterface;
use Psr\EventDispatcher\StoppableEventInterface;

/**
 * Class EventDispatcher
 * @package PCore\Event
 * @github https://github.com/pcore-framework/event
 */
class EventDispatcher implements EventDispatcherInterface
{

    /**
     * @param ListenerProvider $listenerProvider
     */
    public function __construct(protected ListenerProvider $listenerProvider)
    {
    }

    /**
     * Отправка событий
     *
     * @param object $event
     * @return object
     */
    public function dispatch(object $event)
    {
        foreach ($this->listenerProvider->getListenersForEvent($event) as $listener) {
            $listener->process($event);
            if ($event instanceof StoppableEventInterface && $event->isPropagationStopped()) {
                break;
            }
        }
        return $event;
    }

    /**
     * @return ListenerProvider
     */
    public function getListenerProvider(): ListenerProvider
    {
        return $this->listenerProvider;
    }

}