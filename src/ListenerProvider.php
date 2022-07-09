<?php

declare(strict_types=1);

namespace PCore\Event;

use PCore\Event\Contracts\EventListenerInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * Class ListenerProvider
 * @package PCore\Event
 * @github https://github.com/pcore-framework/event
 */
class ListenerProvider implements ListenerProviderInterface
{

    /**
     * @var array
     */
    protected array $events = [];

    /**
     * Зарегистрированный слушатель
     *
     * @var EventListenerInterface[]
     */
    protected array $listeners = [];

    /**
     * Зарегистрировать один прослушиватель событий
     *
     * @param EventListenerInterface $eventListener
     */
    public function addListener(EventListenerInterface $eventListener)
    {
        $listener = $eventListener::class;
        if (!$this->listened($listener)) {
            $this->listeners[$listener] = $eventListener;
            foreach ($eventListener->listen() as $event) {
                $this->events[$event][] = $eventListener;
            }
        }
    }

    /**
     * @return EventListenerInterface[]
     */
    public function getListeners(): array
    {
        return $this->listeners;
    }

    /**
     * Определить был ли он отслежен
     *
     * @param string $listeners
     * @return bool
     */
    public function listened(string $listeners): bool
    {
        return isset($this->listeners[$listeners]);
    }

    /**
     * Получить слушателя
     *
     * @param object $event
     * @return iterable
     */
    public function getListenersForEvent(object $event): iterable
    {
        return $this->events[$event::class] ?? [];
    }

}