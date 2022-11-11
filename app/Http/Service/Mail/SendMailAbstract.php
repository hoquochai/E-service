<?php

namespace App\Http\Service\Mail;

use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;

abstract class SendMailAbstract
{
    /**
     * @var
     */
    private $host;

    /**
     * @var
     */
    private $port;

    /**
     * @var
     */
    private $username;

    /**
     * @var
     */
    private $password;

    /**
     * @var mixed|string
     */
    private $SMTPSecure;

    /**
     * @var
     */
    private $from;

    /**
     * @param $host
     * @param $port
     * @param $username
     * @param $password
     * @param $from
     * @param string $SMTPSecure
     */
    public function __construct($host, $port, $username, $password, $from, string $SMTPSecure = 'ssl')
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->from = $from;
        $this->SMTPSecure = $SMTPSecure;
    }

    /**
     * @param array $to
     * @param string $subject
     * @param string $content
     * @param array $options
     * @return bool
     */
    public function send(
        array $to = [],
        string $subject = '',
        string $content = '',
        array $options = []
    ) :bool
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

            foreach ($to as $email => $name) {
                $mail->addAddress($email, $name);
            }

            $mail->isHTML(isset($options['isHtml']) && $options['isHtml']);

            $mail->Subject = $subject;
            $mail->Body = $content;

            if (!$mail->send()) {
                Log::info('Send mail failure');
                Log::error($mail->ErrorInfo);

                return false;
            }

            return true;
        } catch (\Exception $exception) {
            Log::info('Send mail has the exception');
            Log::error($exception->getMessage());

            return false;
        }
    }
}
