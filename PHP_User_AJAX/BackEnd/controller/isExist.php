<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once '../modules/isUser.php';
$isUser=new IsUser();

if(isset($_GET['check'])){


    if(trim($_GET['check'])!==''){
        echo json_encode(['Status'=> $isUser->IsUser($_GET['check'])], JSON_UNESCAPED_UNICODE);
    }



}



?>