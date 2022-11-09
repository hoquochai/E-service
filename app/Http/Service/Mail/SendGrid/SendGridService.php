<?php

namespace App\Http\Service\Mail\SendGrid;

use App\Http\Service\Mail\SendMailAbstract;
use App\Http\Service\Mail\SendMailInterface;

class SendGridService extends SendMailAbstract implements SendMailInterface
{
    public function __construct()
    {
        $config = config('mail_customize.sendgrid');
        parent::__construct(
            $config['host'],
            $config['port'],
            $config['username'],
            $config['password'],
            $config['from'],
            $config['encryption']
        );
    }
}
