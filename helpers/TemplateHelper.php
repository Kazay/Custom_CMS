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
        
        if (isset($_SESSION['logger']))
        {
            $pageListHtml .= '<span>' . $_SESSION['logger'] . '</span>';
        }

        $header = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/header.html');
        $footer = file_get_contents(TEMPLATE_DIRECTORY . '/layouts/footer.html');
        $pageListHtml .= '<div class="cards-list">';
        foreach ($arrayPages as $page)
        {
            ($page->hidden == '1')? $isChecked = 'checked' : $isChecked = '';

            $pageListHtml .= '<div class="card">';
            $pageListHtml .= '<form action="/admin/edit" method="POST">';
            $pageListHtml .= '<h2 class="title">' . $page->title . '</h2>';
            $pageListHtml .= '<input type="hidden" name="id" value="' . $page->id . '">';
            $pageListHtml .= '<textarea class="content" type="text" name="content">' . $page->content . '</textarea>';
            $pageListHtml .= '<label for="hidden">';
            $pageListHtml .= '<input type="checkbox" name="hidden" value="1" ' . $isChecked . '>';
            $pageListHtml .= 'Hidden</label>';
            $pageListHtml .= '<div class="action">';
            $pageListHtml .= '<input type="submit" name="action" value="Update">';
            $pageListHtml .= '<input type="submit" name="action" value="Delete">';
            $pageListHtml .= '</div>';
            $pageListHtml .= '</form>';
            $pageListHtml .= '</div>';
        }
        $pageListHtml .= '</div>';

        $result = $header . $pageListHtml . $footer;

        unset($_SESSION['logger']);

        return $result;

    }
}
