<?php
/**
 * Created by PhpStorm.
 * User: minmiao
 * Date: 2021-05-20
 * Time: 15:26
 */

namespace Oink\Session;


use Oink\Base;

class SessionManager extends Base
{

    public static function isOpen()
    {
        return session_id() !== '';
    }

    public function open()
    {
        $this->configure();

        if (ini_get('session.auto_start') == 1) {
            session_destroy();
        }

        session_name('OINK_SID');
        session_start();

        $this->sessionStorage->setStorage($_SESSION);
    }

    /**
     * Destroy the session.
     */
    public function close()
    {
        //$this->dispatcher->dispatch(self::EVENT_DESTROY);

        // Destroy the session cookie
        $params = session_get_cookie_params();

        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );

        session_unset();
        session_destroy();
    }

    /**
     * Define session settings.
     */
    private function configure()
    {
        // Session cookie: HttpOnly and secure flags
        session_set_cookie_params(
            SESSION_DURATION,
            $this->helper->url->dir() ?: '/',
            null,
            $this->request->isHTTPS(),
            true
        );

        // Avoid session id in the URL
        ini_set('session.use_only_cookies', '1');
        ini_set('session.use_trans_sid', '0');

        // Enable strict mode
        ini_set('session.use_strict_mode', '1');

        // Better session hash
        ini_set('session.hash_function', '1'); // 'sha512' is not compatible with FreeBSD, only MD5 '0' and SHA-1 '1' seems to work
        ini_set('session.hash_bits_per_character', 6);

        // Set an additional entropy
        ini_set('session.entropy_file', '/dev/urandom');
        ini_set('session.entropy_length', '256');
    }
}