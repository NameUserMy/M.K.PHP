<?php
require_once './Module/getUser.php';
$countUser = count(GetUser(".\data\user.txt"))
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Form</title>
</head>

<body>
    <main>
        <section class="content">
            <span class="text-setting">
                <h1>Menegment user</h1>
            </span>
            <span class="text-setting">
                <h3>count user <?php echo "{$countUser}" ?></h3>
            </span>
            <ul class="main-menu">
                <li><a href="http://localhost:3000/PHPForm/loggin.php">Login</a></li>
                <li><a href="http://localhost:3000/PHPForm/registration.php">Registratioms</a></li>
                <li><a href="http://localhost:3000/PHPForm/showUser.php">Show Info</a></li>
            </ul>
        </section>
    </main>
</body>

</html>