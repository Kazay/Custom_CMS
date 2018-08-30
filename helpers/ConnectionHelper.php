<?php
/**
 *
 */
class ConnectionHelper
{
    const SESSION_KEY = 'currentUser';
    const LOGIN_URI = '/auth/login';

    public static function checkConnectedUser()
    {
        if(isset($_SESSION[self::SESSION_KEY])) {
            $user = new UserModel();
            $user->checkConnection($_SESSION[self::SESSION_KEY]);
        } else {
            header('Location: ' . self::LOGIN_URI);die;
        }
    }
}
