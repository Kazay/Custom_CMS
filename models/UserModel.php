<?php

/**
 * 
 */

include 'Model.php';

class UserModel extends Model
{
    protected $table = 'users';

    function __construct()
    {
        $this->tableName = $this->table;
        parent::__construct();
    }

    public function exist($userInfos)
    {
        $return = FALSE;

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE username = "' . $userInfos['username'] . '" && password = "' . $userInfos['password'] . '" LIMIT 1;';
        if(count($this->executeRequest($sql)) > 0)
            $return = TRUE;

        return $return;
    }

}