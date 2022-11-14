# E-service
<hr>

## About e-service
E-service can help you send mail to another email quickly and conveniently

## Technical stack
- PHP (Laravel framework)

## Project structure
- Base on laravel framework structure
- Besides that, I add a service folder(inside app/Http directory), this folder contain code of other service(example: mail, s3...)
- I use interface to design struct of service, and use abstract class for define the common function
- With this structure, very easy custom if you want to write yourself service. You can over right the function of abstract class
- If you want to add the server mail provider, let add config to the **_mail_customize.php_** file, and add value of config to .env file

## Run project
- Clone project: 
```
git clone git@github.com:hoquochai/E-service.git
```

- Run composer for install package: 
```
composer install
```

- Create .env file and add key to server mail provider
```
mv .env.example .env
```
Current, we support the providers: mailtrap, gmail, mailgun, sendgrid, sparkpost

If you want to add a new provider, let add config to the mail_customize.php file

- Start server for local and go to link [http://127.0.0.1:8000](http://127.0.0.1:8000
)
```
php artisan serve
```
Note: Current, we are using _mailtrap server_ is default, and the backup server is _mailgun server_. You can change it in the mail_customize.php file

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
