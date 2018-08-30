<?php
/**
 *
 */
class ConnectionHelper
{
    public static function checkConnectedUser()
    {
        if(isset($_SESSION[SESSION_KEY])) {
            $user = new UserModel();
            $user->checkConnection($_SESSION[SESSION_KEY]);
        } else {
            header('Location: ' . LOGIN_URI);die;
        }
    }
}
