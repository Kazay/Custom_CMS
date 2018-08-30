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
    protected $tableName;

    function __construct()
    {
        $this->dbConnec = new PDO('mysql:host=localhost;dbname=' . self::DB_NAME, self::USERNAME, self::PASSWORD);
    }

    // Retrieve a specific table datas 
    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->tableName;
        $arrayReturn = $this->executeRequest($sql);

        return $arrayReturn;
    }

    // Retrieve a specific table row
    public function getOne($arrayConditions)
    {
        $i = 0;

        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ';
        foreach ($arrayConditions as $key => $value)
        {
            if($i == 0)
                $sql .= $key . ' = "' . $value . '"';
            else
                $sql .= ' && ' . $key . ' = "' . $value . '"';
            
            $i++;
        }
        $sql .= ' LIMIT 1';

        $arrayResult = $this->executeRequest($sql);

        return $arrayResult[0];
    }

    // Prepare and execute SQL request
    protected function executeRequest($sql)
    {
        $request = $this->dbConnec->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $request->execute();
        $arrayResults = $request->fetchAll(PDO::FETCH_OBJ);

        return $arrayResults;
    }
}