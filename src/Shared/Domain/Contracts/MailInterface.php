<?php

namespace Hex\Shared\Domain\Contracts;

interface MailInterface
{
    public function send($users, $template): void;
}
