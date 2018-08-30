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
        echo TemplateHelper::createTemplate('home', $page->getOne('title', 'Home'));
    }

    static public function contact()
    {
        $page = new PageModel();
        echo TemplateHelper::createTemplate('contact', $page->getOne('title', 'Contact'));
    }

    static public function pages()
    {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $arrayPages = $page->getAll();
        echo TemplateHelper::createTemplateManager($arrayPages);
    }
}
