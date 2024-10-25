<?php

require_once './Module/getUser.php';

$users = GetUser("./data/user.txt");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>User Info</title>
</head>


<body>
    <main>

        <div id='all-user'>
        <a class="back" href="http://localhost:3000/PHPForm/index.php"></a>
            <span class="text-setting">Login</span><span class="text-setting">Email</span>
            <?php

            for ($i = 0; $i < count($users); $i++) {
                $user = preg_split("/:/", $users[$i]);
                echo "<span class=\"text-settingUser\">{$user[0]}</span><span class=\"text-settingUser\">{$user[1]}</span>";
            }

            ?>


        </div>

    </main>

</body>

</html>