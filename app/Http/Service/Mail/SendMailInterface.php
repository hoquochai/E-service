<?php

namespace App\Http\Service\Mail;

interface SendMailInterface
{
    public function send($to = [], $subject = '', $content = '', $options = []);
}
