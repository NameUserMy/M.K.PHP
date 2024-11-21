<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

require_once '../Modules/dbConnection.php';
require_once '../Modules/worckDb.php';

ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
ConnectDB::$nameDB = 'filter';
$dbHendle = ConnectDB::GetConnect();

$wDb = new Filter($dbHendle);
if (isset($_GET['country']) || (bool)isset($_GET['city'])) {


    $filterCountry = '';
    $filtercity = '';
    $key='Country';
    $trigger='ASC';
    if (isset($_GET['country'])) {
        for ($i = 0; $i < count($_GET['country']); $i++) {
    
            if ($i === count($_GET['country']) - 1) {
                $filterCountry .= "'{$_GET['country'][$i]}'";
            } else {
                $filterCountry .= "'{$_GET['country'][$i]}',";
            }
        }
    }
    if (isset($_GET['city'])) {
        for ($i = 0; $i < count($_GET['city']); $i++) {
    
            if ($i === count($_GET['city']) - 1) {
                $filtercity .= "'{$_GET['city'][$i]}'";
            } else {
                $filtercity .= "'{$_GET['city'][$i]}',";
            }
        }
    }
    if(isset($_GET['data-key'])){
    
        $key=$_GET['data-key'];
        $trigger=$_GET['data-AD'];
    
    }
    echo json_encode($wDb->GetAllFilter($filterCountry,$filtercity,$trigger,$key), JSON_UNESCAPED_UNICODE);
    exit;
    }


?>


