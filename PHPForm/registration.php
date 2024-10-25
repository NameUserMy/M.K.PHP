<?php
require_once './Module/saveUser.php';
require_once './Module/validate.php';
$validate = new Validate();
$saveUser=new UserSave();

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
    if (isset($_REQUEST['email'])) {
        $login = $_REQUEST['login'];
        $mail = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        if ($validate->Isgood($mail, $login, $pass)) {
           $hesh= password_hash($pass, PASSWORD_BCRYPT,[15]);
            $user = "{$login}:{$mail}:{$hesh}";
            $saveUser->saveUser($user);
        }
    }
    ?>
    <main>
        <form id='formReg' method="post">
        <?php echo "$saveUser->SaveMessage"; ?>
            <a class="back" href="http://localhost:3000/PHPForm/index.php"></a>
            <label class="text-setting">
                <h2>Enter data for registration</h2>
            </label>
            <span class="validate-message"><?php echo "{$validate->mailMessage}"; ?></span>
            <input placeholder="Enter email" name="email" type="email" require />
            <span class="validate-message"><?php echo "{$validate->loginMessage}"; ?></span>
            <input placeholder="Enter login" name="login" time="text" require />
            <span class="validate-message"><?php echo "{$validate->loginMessage}"; ?></span>
            <input placeholder="Enter password" name="password" type="password" require />
            <button type="submit">Confirm</button>
        </form>
    </main>


</body>

</html>