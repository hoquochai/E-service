<?php

namespace App\Http\Service\Mail;

class SendMailService extends SendMailAbstract implements SendMailInterface
{
    public function __construct($mailProvider = '')
    {
        $mailerConfig = config('mail_customize.mailers');

        if ($mailProvider && isset($mailerConfig[$mailProvider])) {
            $config = $mailerConfig[$mailProvider];
        } else {
            $config = $mailerConfig[config('mail_customize.default')];
        }

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
