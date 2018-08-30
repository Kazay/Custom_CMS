<?php
/**
 * 
 */

class TemplateHelper
{
    const TEMPLATE_DIR = 'views';
    const TEMPLATE_DEFAULT = 'page';

    // Create a page template
    public static function createTemplate(stdClass $data, $tplName = '')
    {
        if($tplName == '')
            $tplName = self::TEMPLATE_DEFAULT;

        $page = file_get_contents(self::TEMPLATE_DIR . '/layouts/header.html');
        $page .= file_get_contents(self::TEMPLATE_DIR . '/' . $tplName . '.html');
        $page .= file_get_contents(self::TEMPLATE_DIR . '/layouts/footer.html');
        
        foreach ($data as $key => $value)
        {
            if(strpos($page, '%%' . strtoupper($key) . '%%'))
                $page = str_replace('%%' . strtoupper($key) . '%%' , $value, $page);
        }

        return $page;
    }
}