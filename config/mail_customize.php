<?php

return [
    'default' => env('MAIL_MAILER', 'mailtrap'),
    'backup_mailer' => env('BACKUP_MAILER', 'mailgun'),

    'mailers' => [
        'mailtrap' => [
            'host' => env('MAILTRAP_HOST', 'smtp.mailtrap.io'),
            'port' => env('MAILTRAP_PORT', 587),
            'encryption' => env('MAILTRAP_ENCRYPTION', 'tls'),
            'username' => env('MAILTRAP_USERNAME'),
            'password' => env('MAILTRAP_PASSWORD'),
            'from' => [
                'address' => env('MAILTRAP_FROM_ADDRESS', 'no-reply@e-service.com'),
                'name' => env('MAILTRAP_FROM_NAME', 'E-Service'),
            ],
        ],
        'gmail' => [
            'host' => env('GMAIL_HOST', 'smtp.gmail.com'),
            'port' => env('GMAIL_PORT', 587),
            'encryption' => env('GMAIL_ENCRYPTION', 'tls'),
            'username' => env('GMAIL_USERNAME'),
            'password' => env('GMAIL_PASSWORD'),
            'from' => [
                'address' => env('GMAIL_FROM_ADDRESS', 'no-reply@e-service.com'),
                'name' => env('GMAIL_FROM_NAME', 'E-Service'),
            ],
        ],
        'sendgrid' => [
            'host' => env('SENDGRID_HOST', 'smtp.sendgrid.net'),
            'port' => env('SENDGRID_PORT', 587),
            'encryption' => env('SENDGRID_ENCRYPTION', 'tls'),
            'username' => env('SENDGRID_USERNAME'),
            'password' => env('SENDGRID_PASSWORD'),
            'from' => [
                'address' => env('SENDGRID_FROM_ADDRESS', 'no-reply@e-service.com'),
                'name' => env('SENDGRID_FROM_NAME', 'E-Service'),
            ],
        ],

        'mailgun' => [
            'transport' => 'smtp',
            'host' => env('MAILGUN_HOST', 'smtp.mailgun.org'),
            'port' => env('MAILGUN_PORT', 587),
            'encryption' => env('MAILGUN_ENCRYPTION', 'tls'),
            'username' => env('MAILGUN_USERNAME'),
            'password' => env('MAILGUN_PASSWORD'),
            'from' => [
                'address' => env('MAILGUN_FROM_ADDRESS', 'hello@example.com'),
                'name' => env('MAILGUN_FROM_NAME', 'E-Service'),
            ],
        ],

        'sparkpost' => [
            'transport' => 'smtp',
            'host' => env('SPARKPOST_HOST', 'smtp.sparkpostmail.com'),
            'port' => env('SPARKPOST_PORT', 2525),
            'encryption' => env('SPARKPOST_ENCRYPTION', 'tls'),
            'username' => env('SPARKPOST_USERNAME'),
            'password' => env('SPARKPOST_PASSWORD'),
            'from' => [
                'address' => env('SPARKPOST_FROM_ADDRESS', 'no-reply@e-service.com'),
                'name' => env('SPARKPOST_FROM_NAME', 'E-Service'),
            ],
        ],
    ]
];
