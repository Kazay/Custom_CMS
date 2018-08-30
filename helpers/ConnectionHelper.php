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
        if(isset($_SESSION[self::SESSION_KEY]))
            var_dump('Connected');
        else
        {
            header('Location: ' . self::LOGIN_URI);die;
        }
        // Check if a user exists in session
    }
}