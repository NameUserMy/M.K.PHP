<?php
setcookie('message', '0', time() * 60);
require_once './models/tests.php';
require_once './modules/calculate.php';
$test3 = new Tests();
$result = new Calculate();
$testA3 = &$test3->GetTest3();
$page = 0;
$message = "";
session_start();
$messageInfo="Ваш результат за 2-й тест ".$_SESSION['User']['Result2'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Test 3</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['test3'])) {
        for ($i = 0; $i < 10; $i++) {
            if ($_REQUEST['questions'.$i]!=='') {
                $result->SetAnswer3($_REQUEST['questions'.$i]);
            }else {
                setcookie('message', '1', time() * 60);
                header('Location:test3.php#q0');
                break;
            }
        }
        $_SESSION['User']['Result3']=$result->GetResult3();
        header('Location:./finish.php#0');

    }else {

        switch ($_COOKIE['message']) {
            case 0:
                $message = "";
                
                break;
            case 1:
                $message = "Вы ответили нe на все вопросы, пройдите тест заново.";
                setcookie('message', '0', time() * 60);
                break;
        }
        
    }

    

    ?>
    <main>
    <?php echo "<span class='info'>{$messageInfo}</span>" ?>
        <form class='wraper'>
        <?php echo "<span class='message'>{$message}</span>"; ?>
            <?php

            $id = 0;
            foreach ($testA3 as $value => $key) {
                $id = $page + 1;
                echo "
                <div id='q{$page}' class=\"card\">
                <h3 class=\"head\" >{$value}</h3>";

                echo "<span>  <input type=\"text\"  name=\"questions{$page}\"/></span>";

                if ($page == count($testA3) - 1) {

                    echo "<button type='submit' name='test3' >Accept</button> </div>";
                } else {
                    echo "<a href=\"#q{$id}\">Next</a>
                </div>";
                }

                $page++;
            };

            ?>
    </main>
</body>

</html>