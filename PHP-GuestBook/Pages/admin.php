
<?php
require_once '../modules/dbConnection.php';
ConnectDB::$pass = '';
ConnectDB::$userNme = 'root';
$DB = ConnectDB::GetConnect();
$qwery = "SELECT * FROM  Guest";
$test= $DB->query($qwery);
$rows=$test->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin</title>
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
                <span class='message-id'>id: $value[0]</span>
                <span class='message-visible'>is: $value[7]</span>
                </div>
                ";
            }
            
            
            ?>
           
        </section>
        <form class='form-comment' method="POST" action="../Controller/adminMessage.php">
        <a href='message.php'>Go to Guest</a>
            <div class='menu-admin'>
            <input type="number" name="id" placeholder="id message" require />
            <input id='hide' type="radio" title='Hide message' name="isVisible" value="hide" />
            <input id='hide' type="radio" title='Show message' name="isVisible" value="show" checked />
           
            </div>
           
            <textarea name="answer" require>
            </textarea>
            <input type="submit" value="Остветить" name='admin' />
        </form>
    </main>
</body>
</html>