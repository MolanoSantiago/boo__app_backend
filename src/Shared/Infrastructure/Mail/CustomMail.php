<?php

namespace Hex\Shared\Infrastructure\Mail;

use Hex\Shared\Domain\Contracts\MailInterface;
use Illuminate\Support\Facades\Mail;

final class CustomMail implements MailInterface
{
    public function send($users, $template): void
    {
        Mail::to($users)->send($template);
    }
}
