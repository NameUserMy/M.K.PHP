<?php
//require_once './Modules/control.php';
require_once './Modules/button.php';
require_once './Modules/text.php';
require_once './Modules/label.php';
$button = new Button("green", '150px', '50px', 'namePetya', 'petya');
$text = new Text("grey", '150px', '50px', 'vasya', 'petya', 'PlaceHolder');
$label = new Label("orange", '150px', '50px', $text, 'For text');

function convertToHtml(Control $control)
{
    $control->GetElement();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    convertToHtml($button);
    echo "</br>";
    convertToHtml($text);
    convertToHtml($label);

    

    ?>

</body>

</html>