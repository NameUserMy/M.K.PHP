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

if (isset($_GET['checkBox'])) {

    if ($_GET['checkBox'] !== '') {
        echo json_encode($wDb->forCheckBoxC(), JSON_UNESCAPED_UNICODE);
        exit;
    }
}

if (isset($_GET['All'])) {

    if ($_GET['All'] !== '') {
        echo json_encode($wDb->GetAllInfo('', ''), JSON_UNESCAPED_UNICODE);
        exit;
    }
}

if (isset($_GET['data-AD']) && isset($_GET['data-key'])) {
    if ($_GET['data-AD'] !== '' && $_GET['data-key'] !== '') {
        echo json_encode($wDb->SortByAD($_GET['data-AD'], $_GET['data-key']), JSON_UNESCAPED_UNICODE);
        exit;
    }
}
