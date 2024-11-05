<?php
session_start();
$messageInfo = "Поздравляем " . $_SESSION['User']['Name'] . " Ваш общий результат "
    . $_SESSION['User']['Result1'] + $_SESSION['User']['Result2'] + $_SESSION['User']['Result3'];



if (isset($_GET['NewTest']) !== false) {
    $_SESSION['User']['Result1'] = 0;
    $_SESSION['User']['Result2'] = 0;
    $_SESSION['User']['Result3'] = 0;
    header('Location:test1.php#q0');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="finish.css">
    <title>Congratulation</title>
</head>

<body>
    <main>
        <?php echo "<span class='info'>{$messageInfo}</span>" ?>
        <form class='wraper'>
            <div class="card">
                <button type="submit" name="NewTest">Начать заново</button>
            </div>
        </form>

    </main>
</body>

</html>