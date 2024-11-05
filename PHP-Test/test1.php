<?php
setcookie('message', '0', time() * 60);
require_once './models/tests.php';
require_once './modules/calculate.php';
$test1 = new Tests();
$result = new Calculate();
$testA1 = &$test1->GetTest1();
$page = 0;
$message = "";

static $messageStatus = 0;

session_start();

$messageInfo="Здравствуйте ".$_SESSION['User']['Name'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="test.css">
    <title>Test 1</title>
</head>

<body>
    <?php


    if (isset($_REQUEST['test1'])) {
        for ($i = 0; $i < 10; $i++) {
            if (isset($_REQUEST['questions' . $i]) !== false) {
                $result->SetAnswer($_REQUEST['questions' . $i]);
            } else {

                setcookie('message', '1', time() * 60);
                header('Location:test1.php#q0');
                break;
            }
        }
        $_SESSION['User']['Result1']=$result->GetResult1();
        header('Location:test2.php#q0');


    } else {

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
        <form name="test1" class='wraper'>
        
            <?php echo "<span class='message'>{$message}</span>"; ?>
            <?php

            $id = 0;
            foreach ($testA1 as $value => $key) {
                $id = $page + 1;
              

                echo "
                <div id='q{$page}' class=\"card\">
                    <h3 class=\"head\" >{$value}</h3>";
                    
               
                if($id>0){

                    $message="";
                }
                
                $var = range(0, 2);
                shuffle($var);
                
                foreach ($var as $value1) {
                    echo "<span>  <input type=\"radio\" value={$value1} name=\"questions{$page}\"/>{$testA1[$value][$value1]}</span>";
                }
                if ($page == count($testA1) - 1) {

                    echo "<button type='submit'name='test1'>Accept</button> </div>";
                } else {
                    echo "<a href=\"#q{$id}\">Next</a>
                </div>";
                }

                

                $page++;
            };

            ?>

        </form>

    </main>
</body>

</html>