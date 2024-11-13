<?php
require_once '../modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();
$qwery = "SELECT * FROM  Guest where IsVisible='show'";
$test= $DB->query($qwery);
$rows=$test->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="message.css">
    <title>Guest</title>
</head>

<body>
    <header></header>
    <main>

        <section class='comment-wrap'>
            <?php
            foreach($rows as $key=>$value){
                
                echo"
                <div class='message'>
                <span class='head-message'>Имя: {$value[1]}, Город: {$value[3]}, Email: {$value[4]}</span>
                <span class='other-message'>Отзыв:</span>
                <span class='other-message'>$value[2]</span>
                <span class='other-message'>Ответ:</span>
                <span class='other-message'>$value[5]</span>
                <span class='other-message'>$value[6]</span>
                </div>
                ";
            }
            
            
            ?>
           
        </section>
        <form class='form-comment' method="POST" action="../Controller/addMessage.php">
        <a href='admin.php'>Go to Admin</a>
            <input type="text" name="userName" placeholder="Enter yuor name *" require />
            <input type="text" name="city" placeholder="Enter yuor City" require />
            <input type="text" name="email" placeholder="Enter yuor email" require />
            <textarea name="message" require>
            </textarea>
            <input type="submit" value="Оставить отзыв" name='comment' />
        </form>
    </main>
    
</body>

</html>