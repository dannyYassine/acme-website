<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-23
 * Time: 7:25 AM
 */

namespace App\Classes;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    protected $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer();
        $this->setUp();
    }

    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = ($data['subject']);
        $this->mail->Body = make($data['view'], array('data' => $data['body']));
        try {
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo $e;
            return false;
        }
    }

    public function setUp()
    {
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'ssl';

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        $environment = getenv('APP_ENV');
//        if ($environment === 'local') {
            $this->mail->SMTPDebug = 1;
//        }

        // Auth info
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        // sender info
        $this->mail->setFrom(getenv('ADMIN_EMAIL'), getenv('APP_NAME'));
//        $this->mail->From =
//        $this->mail->FromName =
    }
}