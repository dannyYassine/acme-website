<?php
/**
 * Created by PhpStorm.
 * User: dannyyassine
 * Date: 2018-07-27
 * Time: 7:31 AM
 */
namespace App\Classes;

class CSRFToken
{
    /**
     * Produces token for session
     * @return mixed
     * @throws Exception
     */
    public static function _token()
    {
        if (!\App\Classes\Session::has(SessionKey::TOKEN)) {
            $token = base64_encode(openssl_random_pseudo_bytes(32));
            \App\Classes\Session::add(SessionKey::TOKEN, $token);
        }
        return \App\Classes\Session::get(SessionKey::TOKEN);
    }

    /**
     * Verifies request token
     * @param $requestToken
     * @throws Exception
     */
    public static function verifyCSRFToken($requestToken)
    {
        if (\App\Classes\Session::has(SessionKey::TOKEN) && \App\Classes\Session::get(SessionKey::TOKEN) === $requestToken) {
            Session::remove(SessionKey::TOKEN);
            return true;
        }
        return false;
    }
}