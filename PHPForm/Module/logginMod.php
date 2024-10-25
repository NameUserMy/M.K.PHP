<?php
require_once 'getUser.php';

function Loggin($login, $pass)
{

    $users = GetUser("./data/user.txt");
    $key = -1;
    for ($i = 0; $i < count($users); $i++) {

        $temp = preg_split("/:/", $users[$i]);
        if ($temp[0] == $login) {
            $key = $i;
            break;
        }

    }

    if ($key>=0) {
        $user = preg_split("/:/", $users[$key]);
        return  password_verify($pass, $user[2]);
    }


    return false;
}
