<?php
require_once 'connectionDb.php';
class IsUser
{

    private $DB;
    public function __construct()
    {
        ConnectDB::$userNme = 'root';
        ConnectDB::$pass = '';
        ConnectDB::$nameDB = 'user';
        $this->DB = ConnectDB::GetConnect();
    }
    public function IsUser(string $name): bool
    {
        $response = $this->DB->query("SELECT * FROM user");
        $rows = $response->fetchAll();
        foreach ($rows as $key => $value) {
            if ($value[1] === $name) {
                return false;
            };
        }
        return true;
    }
}
