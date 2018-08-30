<?php
    session_start();
    spl_autoload_register(function($className) {
        $directory = '';
        if(strpos($className, 'Helper')) {
            $directory = 'helpers';
        } else if(strpos($className, 'Controller')){
            $directory = 'controllers';
        } else if(strpos($className, 'Model')) {
            $directory = 'models';
        } else {
            throw new \Exception("Error including class. Check your code");
        }
        include './' . $directory . '/' . $className . '.php';
    });
    RouteHelper::getRoute();
