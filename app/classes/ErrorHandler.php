<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-25
 * Time: 8:51 AM
 */

namespace App\Classes;

use Symfony\Component\Debug\Exception\FatalErrorException;
use Whoops\Exception\ErrorException;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class ErrorHandler
{
    private static $whoops;

    public static function handleException($e)
    {
        self::$whoops->handleException($e);
    }

    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $env = getenv('APP_ENV');

        if ($env === 'local') {
            self::$whoops = new Run;
            self::$whoops->pushHandler(new PrettyPageHandler());
            self::$whoops->register();
        } else {
            $error = "[{$error_number}] An error occured in file {$error_file} on {$error_line}: {$error_message}";

            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System error',
                'view' => 'errors',
                'name' => 'John Doe',
                'body' => $error
            ];

            $errorHandler = new ErrorHandler();
            $errorHandler
                ->emailAdmin($data)
                ->outputFriendlyError();
        }
    }

    public function outputFriendlyError()
    {
        ob_end_clean();
        view('error/generic');
        exit;
    }

    public function emailAdmin($data)
    {
        $mail = new Mail();
        $mail->send($data);

        return $this;
    }
}