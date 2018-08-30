<?php
/**
 *
 */
class AuthController
{
    public function login()
    {
        echo TemplateHelper::createTemplate('login', new stdClass());
    }

    public function loginAction()
    {
        $user = new UserModel();
        $username = $user->connectUser();
        $_SESSION[SESSION_KEY] = $username;
        header('Location: /view/home');die;
    }
    public function logoutAction()
    {
        //@TODO update is_connected to 0
        session_destroy();
        header('Location: /view/home');die;
    }
}
