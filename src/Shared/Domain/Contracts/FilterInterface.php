<?php

namespace Hex\Shared\Domain\Contracts;

interface FilterInterface
{
    public function apply($query): void;
}
