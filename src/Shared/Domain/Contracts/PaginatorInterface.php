<?php

namespace Hex\Shared\Domain\Contracts;

interface PaginatorInterface
{
    public function getData(): array;
    public function getCurrentPage(): int;
    public function getLastPage(): int;
    public function getPerPage(): int;
    public function getTotal(): int;
    public function getFirstItem(): ?int;
    public function getLastItem(): ?int;
}
