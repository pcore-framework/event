<?php

declare(strict_types=1);

namespace PCore\Event\Contracts;

/**
 * Interface EventListenerInterface
 * @package PCore\Event\Contracts
 * @github https://github.com/pcore-framework/event
 */
interface EventListenerInterface
{

    public function listen(): iterable;

    public function process(object $event): void;

}