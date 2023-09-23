<?php

namespace Hex\Shared\Infrastructure\Messaging;

use Twilio\Rest\Client;
use Hex\Shared\Domain\Contracts\MessagingInterface;

final class CustomMessaging implements MessagingInterface
{
    public function send(string $message, string|array $recipients): string
    {
        $account_sid = env('TWILIO_ACCOUNT_SID');
        $auth_token = env('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_PHONE_NUMBER');
        $client = new Client($account_sid, $auth_token);
        $response = $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
        
        return $response->status;
    }
}
