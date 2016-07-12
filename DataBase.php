<?php

class DataBase
{
    private $dbHook;

    public function __construct($host, $user, $pass, $dbName)
    {
        $this->dbHook = new mysqli($host, $user, $pass, $dbName);
    }

    public function select($query)
    {
        /** @var mysqli_result $result */
        $result = $this->dbHook->query($query);
        return $result;
    }

    public function fetchRow(mysqli_result $result){
        return $result->fetch_array();
    }

    public function realEscapeString($str){
        return $this->dbHook->real_escape_string($str);
    }
}