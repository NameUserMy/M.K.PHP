<?php 

$func = "start";

function start()
{

    $time = time_nanosleep(2, 0);
    if ($time === true) {
        header("Location: http://localhost:3000/PHPForm/index.php");
        die();
    }

    return $time;
}

function test($func)
{
    $func();
}



stat($func);


?>