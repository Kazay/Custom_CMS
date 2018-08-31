<?php
/**
 *
 */
class AdminController
{

    static public function list()
    {
        ConnectionHelper::checkConnectedUser();
        $page = new PageModel();
        $arrayPages = $page->getAll();
        echo TemplateHelper::createTemplateManager($arrayPages);
    }

    static public function edit()
    {
        $response = '';

        if($_POST['action'] == 'Delete')
            $response = self::delete($_POST['id']);
        elseif($_POST['action'] == 'Update')
            $response = self::update($_POST);

        ($response) ? $_SESSION['logger'] = 'Success' : 'Fail';
        Header('Location: /admin/list');
    }

    private static function delete($id)
    {
        $page = new PageModel();
        $response = $page->deleteOne($id);

        return $response;
    }

    private static function update($data)
    {
        $page = new PageModel();
        $response = $page->update($data);

        return $response;
    }

}
