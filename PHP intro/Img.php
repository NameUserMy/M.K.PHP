<?php
$count = count(scandir("./img")) - 2;
$src = array_diff(scandir("./img"), array('..', '.'));
$imgSrc = array();
?>

<!DOCTYPE html>
<html style="width: 100%; height: 100%;" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Image</title>
</head>

<body style="width:100%; height: 100%; margin:0; ">

    <div id="img">
    <span id="count-img">Count image:<?php echo"$count" ?> </span>
        <?php
        foreach ($src as $value) {
            $imgSrc[] = "./img/$value";
        }

        for ($i = 0; $i < count($imgSrc); $i++) {


            echo "<img style=\"width:calc(100%)\" src=$imgSrc[$i]></img>";
        }
       
        ?>
    </div>
</body>

</html>