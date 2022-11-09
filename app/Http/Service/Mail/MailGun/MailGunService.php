<?php

namespace App\Http\Service\Mail\MailGun;

use App\Http\Service\Mail\SendMailAbstract;
use App\Http\Service\Mail\SendMailInterface;

class MailGunService extends SendMailAbstract implements SendMailInterface
{
    public function __construct()
    {
        $config = config('mail_customize.mailgun');
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
