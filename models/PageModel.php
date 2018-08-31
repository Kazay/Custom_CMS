<?php
include_once('Model.php');
/**
 *
 */
class PageModel extends Model
{
    function __construct()
    {
        $this->tableName = 'pages';
        // Execute the direct parent constructor
        parent::__construct();
    }

    public function update($data)
    {
        $id = $data['id'];
        $content = substr($this->dbConnec->quote($data['content']), 1, -1);
        if(isset($data['hidden']))
            $hidden = 1;
        else {
            $hidden = 0;
        }
        $request = $this->dbConnec->prepare('UPDATE ' . $this->tableName . ' SET content = "' . $content . '", hidden = "' . $hidden . '" WHERE id = "' . $id . '" LIMIT 1');
        $response = $request->execute();
        return $response;
    }
}
