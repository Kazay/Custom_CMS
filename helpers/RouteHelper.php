<?php
/**
 *
 */
class RouteHelper
{
    const CLASS_SUFFIX = 'Controller';
    /*
    * Get the URI and format it
    * Output : Two strings, a class name and a method name
    */
    static public function getRoute()
    {
        $baseUri = $_SERVER['REQUEST_URI'];
        $baseUri = substr($baseUri, 1);
        $uris = explode('/', $baseUri);
        $uris[0] = $uris[0] . self::CLASS_SUFFIX;
        if(count($uris) !== 2) {
            throw new \Exception("Error formating route");
        }
        self::executeAction($uris);
    }
    static private function executeAction($uris)
    {
        //@TODO Catch exception coming from autoloader
        ucfirst($uris[0])::{$uris[1]}();
    }
}
