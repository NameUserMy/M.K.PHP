<?php
class ConnectDB
{
    private static $dbHandle;
    public static string $userNme;
    public static string $pass;
    public static string $nameDB;
    public static function GetConnect()
    {
            self::$dbHandle = new PDO('mysql:host=localhost;dbname='.self::$nameDB, self::$userNme, self::$pass);
            return self::$dbHandle;
    }
}

//filter