<?php

namespace Hex\Shared\Infrastructure\Pagination;

use Hex\Shared\Domain\Contracts\PaginatorInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class LengthAwarePaginatorAdapter implements PaginatorInterface
{
    private LengthAwarePaginator $paginator;

    public function __construct(LengthAwarePaginator $paginator)
    {
        $this->paginator = $paginator;
    }

    public function getData(): array
    {
        return $this->paginator->items();
    }

    public function getCollection()
    {
        return $this->paginator->getCollection();
    }

    public function getCurrentPage(): int
    {
        return $this->paginator->currentPage();
    }

    public function getLastPage(): int
    {
        return $this->paginator->lastPage();
    }

    public function getPerPage(): int
    {
        return $this->paginator->perPage();
    }

    public function getTotal(): int
    {
        return $this->paginator->total();
    }

    public function getFirstItem(): ?int
    {
        return ($this->paginator->firstItem()) ? $this->paginator->firstItem() : null;
    }

    public function getLastItem(): ?int
    {
        return ($this->paginator->lastItem()) ? $this->paginator->lastItem() : null;
    }
}
