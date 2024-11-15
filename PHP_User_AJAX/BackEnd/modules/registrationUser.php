<?php

require_once 'connectionDb.php';
class Registration
{

    private $DB;


    public function __construct()
    {
        ConnectDB::$userNme = 'root';
        ConnectDB::$pass = '';
        ConnectDB::$nameDB = 'user';
        $this->DB = ConnectDB::GetConnect();
    }

    public function Registration(string $loggin) {
        $this->DB->exec("INSERT INTO user (Login) VALUES('{$loggin}')");
    }
}
