<?php
/**
 * 
 */

class ViewController
{
    static public function home()
    {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        echo TemplateHelper::createTemplate($page->getOne(array('title' => 'Home')), 'home');
    }

    static public function contact()
    {
        $page = new PageModel();
        echo TemplateHelper::createTemplate($page->getOne(array('title' => 'Contact')));
    }

}