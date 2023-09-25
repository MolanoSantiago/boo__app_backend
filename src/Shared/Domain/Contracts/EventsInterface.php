<?php

namespace Hex\Shared\Domain\Contracts;

interface EventsInterface
{
    public function call($event): void;
}
