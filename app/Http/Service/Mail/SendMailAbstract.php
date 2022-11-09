<?php

namespace App\Http\Service\Mail;

use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;

abstract class SendMailAbstract
{
    private $host;
    private $port;
    private $username;
    private $password;
    private $SMTPSecure;
    private $from;
    public function __construct($host, $port, $username, $password, $from, $SMTPSecure = 'tls')
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->from = $from;
        $this->SMTPSecure = $SMTPSecure;
    }

    public function send($to = [], $subject = '', $content = '', $options = [])
    {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $this->host;
        $mail->Port = $this->port;
        $mail->SMTPAuth = true;
        $mail->Username = $this->username;
        $mail->Password = $this->password;
        $mail->SMTPSecure = $this->SMTPSecure;

        try {
            $mail->From = isset($this->from['address']) ? $this->from['address'] : '';
            $mail->FromName = isset($this->from['name']) ? $this->from['name'] : '';

            foreach ($to as $receives) {
                foreach ($receives as $key => $value) {
                    $mail->addAddress($key, $value);
                }
            }

            $mail->isHTML(isset($options['isHtml']) && $options['isHtml']);

            $mail->Subject = $subject;
            $mail->Body = $content;

            return $mail->send();
        } catch (\Exception $exception) {
            Log::info('Send mail failure');
            Log::error($exception->getMessage());

            return false;
        }
    }
}
