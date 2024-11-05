<?php
setcookie('message', '0', time() * 60);
require_once './models/tests.php';
require_once './modules/calculate.php';
$test2 = new Tests();
$result = new Calculate();
$testA2 = &$test2->GetTest2();
$page = 0;
$message = "";
session_start();

$messageInfo="Ваш результат за 1-й тест ".$_SESSION['User']['Result1'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Test 2</title>
</head>

<body>
    <?php




if (isset($_REQUEST['test2'])) {
    
        for ($i = 0; $i < 10; $i++) {
            if (isset($_REQUEST['questions' . $i])!==false) {
                $result->SetAnswer2($_REQUEST['questions' . $i]);
            }else {

                setcookie('message', '1', time() * 60);
                header('Location:test2.php#q0');
                break;
            }
        }
        $_SESSION['User']['Result2']=$result->GetResult2();
        header('Location:./test3.php#q0');
        
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
            foreach ($testA2 as $value => $key) {
                $id = $page + 1;
                echo "
                <div id='q{$page}' class=\"card\">
                    <h3 class=\"head\" >{$value}</h3>";
                $var = range(0, 2);
                shuffle($var);
                foreach ($var as $value1) {
                    echo "<span>  <input type=\"checkbox\" value={$value1} name=\"questions{$page}[]\"/>{$testA2[$value][$value1]}</span>";
                }
                if ($page == count($testA2)-1) {

                    echo "<button type='submit' name='test2'>Accept</button> </div>";
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