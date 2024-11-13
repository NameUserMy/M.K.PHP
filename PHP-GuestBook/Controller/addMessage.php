<?php
require_once '../modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();

if (isset($_REQUEST['comment'])) {

    if ($_REQUEST['userName'] === '' || $_REQUEST['message'] === '') {
        header('location:../Pages/message.php');
    } else {

        $name =  trim($_REQUEST['userName']);
        $message = trim($_REQUEST['message']);
        $mail = $_REQUEST['email'] ? trim($_REQUEST['email']) : '';
        $city = $_REQUEST['city'] ? trim($_REQUEST['city']) : '';

        $DB->exec(
            "INSERT INTO Guest (Name,Msg,City,Email) VALUES ('$name','$message','$city','$mail')"
        );

        header('location:../Pages/message.php');
    }
}
