<?php
/**
 * 
 */

class Model
{
    //@TODO Remove properties and put them where they will not be commited
    const DB_NAME = 'my_cms';
    const USERNAME = 'root';
    const PASSWORD = '0000';
    protected $dbConnec;

    function __construct()
    {
        $this->dbConnec = new PDO('mysql:host=localhost;dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
    }
}