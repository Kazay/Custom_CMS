<?php

spl_autoload_register(function($className) {
    if(strpos($className, 'Helper'))
    {
       $directory = 'helpers';
    }
    elseif(strpos($className, 'Controller'))
    {
        $directory = 'controllers';
    }
    elseif(strpos($className, 'Model'))
    {
        $directory = 'models';
    }
    else
    {
        throw new \Exception('Error including class. Please check your code', 1);
    }
    include './' . $directory . '/' . $className . '.php';
});

RouteHelper::getRoute();