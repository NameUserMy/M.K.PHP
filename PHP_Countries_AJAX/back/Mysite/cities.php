<?php
require_once './Modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();



if(isset($_REQUEST['cities'])){

$qwery = "SELECT * FROM  Cities where Countryid='{$_REQUEST['cities']}' ";
$test= $DB->query($qwery);
$rows=$test->fetchAll();
$cities=array();

foreach($rows as $key=>$value){
    array_push($cities,$value[1]);
}
    echo json_encode($cities, JSON_UNESCAPED_UNICODE);

}



?>