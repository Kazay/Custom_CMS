<?php
/**
 *
 */
class Model
{
    //@TODO remove the properties and put them inside a non commitable config file
    const DB_NAME = 'my_cms';
    const USER = 'root';
    const PASS = '0000';
    protected $dbConnec;
    protected $tableName;

    function __construct()
    {
        $this->dbConnec = new PDO('mysql:host=localhost;dbname=' . self::DB_NAME, self::USER, self::PASS);
    }

    public function getAll()
    {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->tableName);
        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function getOne($identifierKey, $identifierValue)
    {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->tableName . ' WHERE ' . $identifierKey .  ' = "' . $identifierValue . '" LIMIT 1');
        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        return $results[0];
    }
}
