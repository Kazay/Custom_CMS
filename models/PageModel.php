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
}
