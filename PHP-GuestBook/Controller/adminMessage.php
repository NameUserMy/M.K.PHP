<?php
require_once '../modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();
$id = 0;

if (isset($_REQUEST['admin'])) {
    if ($_REQUEST['id'] === '') {
        header('location:../Pages/admin.php');
    } else {
        $id = $_REQUEST['id'];
        $answer = $_REQUEST['answer'];

        echo(strlen(trim($answer)));
        if (strlen(trim($answer))>1) {
            $queryAnswer = "UPDATE Guest SET Answer='{$_REQUEST['answer']}' Where id={$id}";
            $DB->exec($queryAnswer);
            header('location:../Pages/admin.php');
        } else if (strlen(trim($answer)) === 0 && $_REQUEST['isVisible'] !== '') {


            echo ($_REQUEST['isVisible']);
            $queryIsShow = "UPDATE Guest SET IsVisible='{$_REQUEST['isVisible']}' Where id={$id}";

            $DB->exec($queryIsShow);
        }
    }
    header('location:../Pages/admin.php');
}
