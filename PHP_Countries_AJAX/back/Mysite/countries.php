<?php
require_once './Modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();

$qwery = "SELECT * FROM  countries";
$test= $DB->query($qwery);
$rows=$test->fetchAll();
$country=array();







foreach($rows as $key=>$value){
    array_push($country,$value[1]);
}
echo json_encode($country, JSON_UNESCAPED_UNICODE);