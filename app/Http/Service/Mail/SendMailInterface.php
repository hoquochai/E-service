<?php

namespace App\Http\Service\Mail;

interface SendMailInterface
{
    public function send(
        array $to = [],
        string $subject = '',
        string $content = '',
        array $options = []
    ): bool;
}
