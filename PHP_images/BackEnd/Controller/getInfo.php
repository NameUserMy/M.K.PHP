<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once '../Modules/infoDb.php';
$infoFile=new GetInfo();


if(isset($_REQUEST['imgsrc'])){
    echo json_encode($infoFile->GetSrc(), JSON_UNESCAPED_UNICODE);
    //echo json_encode(['status'=>true], JSON_UNESCAPED_UNICODE);
    exit;
}else{
    echo json_encode($infoFile->GetCountFile(),JSON_UNESCAPED_UNICODE);

}






?>