<?php

require_once './Module/logginMod.php';
require_once './Module/validate.php';
$validate = new Validate();
$logginMessage = "";
$redirect = false;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <?php






    if (isset($_REQUEST['login'])) {
        $login = $_REQUEST['login'];
        $pass = $_REQUEST['password'];
        if (Loggin($login, $pass)) {
            $logginMessage = "<span class=\"save-message\" style=\"color:green\">Login seccesful</span>";
            $redirect = true;
        } else {
            $logginMessage = "<span class=\"save-message\" style=\"color:red\">Incorrect data</span>";
        }
    }


    ?>
    <main>
        <form id='formlog' method="post">

            <?php
            echo "$logginMessage";


            ?>


            <a class="back" href="http://localhost:3000/PHPForm/index.php"></a>
            <label class="text-setting">
                <h2>Enter data for loggin</h2>
            </label>
            <span class="validate-message"></span>
            <input placeholder="Enter login" name="login" time="text" require />
            <span class="validate-message"></span>
            <input placeholder="Enter password" name="password" type="password" require />
            <button type="submit" onclick="testClick()">Confirm</button>

        </form>
    </main>

    <?php

    if ($redirect) {
        echo "<script>   setTimeout(redirect, 2000);    function redirect() { window.location.assign(\"http://localhost:3000/PHPForm/index.php\"); }  </script>";
    }
    ?>


</body>

</html>