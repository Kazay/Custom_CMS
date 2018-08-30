<?php

/**
 * 
 */

class AuthController
{
    const SESSION_KEY = 'currentUser';

    public function login()
    {
        echo TemplateHelper::createTemplate(new stdClass(), 'login');
    }

    public function loginAction()
    {
        $userInfos = ['username' => $_POST['username'],
                    'password' => $_POST['password'] ];

        $user = new UserModel();
        if($user->exist($userInfos))
        {
            $_SESSION[self::SESSION_KEY] = $userInfos['username'];
            header('Location: /views/home');die;
        }
        else {
            var_dump('User Not Found');die;
        }
            
        
    }
}