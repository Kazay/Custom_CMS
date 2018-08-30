<?php

/**
 * 
 */

include 'Model.php';

class PageModel extends Model
{
    protected $table = 'pages';

    function __construct()
    {
        $this->tableName = $this->table;
        parent::__construct();
    }

}