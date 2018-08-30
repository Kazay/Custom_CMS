<?php
/**
 *
 */
class TemplateHelper
{
    public static function createTemplate(String $templateName, stdClass $values)
    {
        $header = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/header.html');
        $emptyTemplate = file_get_contents(TEMPLATE_DIRECTORY . '/' . $templateName . '.html');
        $footer = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/footer.html');
        $result = $header . $emptyTemplate . $footer;
        foreach ($values as $key => $value) {
            // If the key is found inside the template, we replace the key with the content coming from the DB
            // If not, we do nothing to allow for greater flexibility
            if(strpos($result, '%%' . strtoupper($key) . '%%')) {
                $result = str_replace('%%' . strtoupper($key) . '%%', $value, $result);
            }
        }
        return $result;
    }

    public static function createTemplateManager($arrayPages)
    {
        $pageListHtml = '';

        $header = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/header.html');
        $footer = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/footer.html');

        foreach ($arrayPages as $page)
        {
            $pageListHtml .= '<form action="/page/updatePage" method="POST">';
            $pageListHtml .= '<span>' . $page->title . '</span>';
            foreach ($page as $key => $value)
            {
                $pageListHtml .= '<input type="text" name="' . $key . '" value="' . $value . '">';
            }
            $pageListHtml .= '<input type="submit" name="" value="Update">';
            $pageListHtml .= '</form>';
        }
        $result = $header . $pageListHtml . $footer;

        return $result;

    }
}
