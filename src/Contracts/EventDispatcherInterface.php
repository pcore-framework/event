<?php

declare(strict_types=1);

namespace PCore\Event\Contracts;

use Psr\EventDispatcher\EventDispatcherInterface as PsrEventDispatcherInterface;
use Psr\EventDispatcher\ListenerProviderInterface;

/**
 * Interface EventDispatcherInterface
 * @package PCore\Event\Contracts
 * @github https://github.com/pcore-framework/event
 */
interface EventDispatcherInterface extends PsrEventDispatcherInterface
{

    public function getListenerProvider(): ListenerProviderInterface;

}