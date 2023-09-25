<?php

namespace Hex\Shared\Infrastructure\Events;

use Hex\Shared\Domain\Contracts\EventsInterface;

class CustomEvent implements EventsInterface
{
    public function call($event): void
    {
        event($event);
    }
}
