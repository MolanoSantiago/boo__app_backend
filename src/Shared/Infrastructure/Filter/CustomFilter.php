<?php

namespace Hex\Shared\Infrastructure\Filter;

use Hex\Shared\Domain\Contracts\FilterInterface;

class CustomFilter implements FilterInterface
{
    private array $criteria;

    public function __construct(array $criteria)
    {
        $this->criteria = $criteria;
    }

    public function apply($query): void
    {
        foreach ($this->criteria as $criterion) {
            if ($criterion instanceof FilterInterface) {
                $criterion->apply($query);
            }
        }
    }
}
