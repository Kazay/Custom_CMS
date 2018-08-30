<?php
/**
 * 
 */

class RouteHelper
{
    const CLASS_SUFFIX = 'Controller';

    /*
    * Get URI, format it and return class and method
    */
    static public function getRoute()
    {   
        $arrayRoute = explode('/', substr($_SERVER['REQUEST_URI'], 1));
        $arrayRoute[0] = ucfirst($arrayRoute[0]) . self::CLASS_SUFFIX;

        if(count($arrayRoute) !== 2)
            throw new \Exception('Error formating route.', 1); 
        else
            self::executeAction($arrayRoute);
    }

    static private function executeAction($arrayRoute)
    {
        //@TODO Catch exception coming from autoloader
        $arrayRoute[0]::{$arrayRoute[1]}();
    }
}