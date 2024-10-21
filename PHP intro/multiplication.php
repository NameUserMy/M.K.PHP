<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div style="display:flex; gap: 20px;">
        <?php


        for ($i = 2; $i < 10; $i++) {
            echo "<div>";
            for ($j = 1; $j < 10; $j++) {
                $result = $i * $j;

                echo "$i * $j = $result</br>";
            }
            echo "</div>";
        }


        ?>

    </div>
</body>

</html>