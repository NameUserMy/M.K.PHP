<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once '../modules/registrationUser.php';
$registration = new Registration();

if(isset($_POST['loggin'])){


    if($_POST['loggin']!==''){
        echo json_encode(['Status'=>true], JSON_UNESCAPED_UNICODE);
        $registration->Registration($_POST['loggin']);
        exit;
    }else{

        echo json_encode(['Status'=>false], JSON_UNESCAPED_UNICODE);
        exit;
    }

    
}



