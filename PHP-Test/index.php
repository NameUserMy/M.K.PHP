<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>The Super Test</title>
</head>

<body>
    <?php
$message="Введите имя и начните тест.";
    if (isset($_REQUEST['Name'])) {
       
        
        if($_REQUEST['name']!=''){

            session_start();
            $_SESSION['User']=array(
                'Name'=>$_REQUEST['name'],
                'Result1'=>0,
                'Result2'=>0,
                'Result3'=>0,

            );
            header('Location:test1.php#q0');

        }
      
    }

    ?>
    <main>
        <?php echo"<span class='info'>{$message}</span>" ?>
        <form  class='wraper'>

            <input type="text" name="name" require />
            <button type="submit" name="Name" >Начать тест</button>

        </form>

    </main>
</body>

</html>