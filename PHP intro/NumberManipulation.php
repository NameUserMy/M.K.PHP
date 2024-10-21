<?php
include_once './Function/digitFunction.php';

$number = 5493256;
$digitNumber = array();
Digit($number, $digitNumber);
$countDigit=count($digitNumber);

$min=MinDigit($digitNumber);
$max=MaxDigit($digitNumber);
$sum=SumDigit($digitNumber);
$avg=round(AvgDigit($digitNumber),2);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Digit</title>
</head>

<body>
    <div id='digit'>
        <h1 class="text">Number is <?php echo "$number" ?> </h1>
        <h2 class="text">
            Digit: <?php foreach ($digitNumber as $key => $value) {
                        if ($key == count($digitNumber) - 1) {
                            echo "$value. ";
                        } else {
                            echo "$value,";
                        }
                    } ?>
        </h2>

        <span class="text">Count digit: <?php echo"$countDigit" ?> </span>
        <span class="text">Min:<?php echo" $min" ?> </span>
        <span class="text">Max:<?php echo" $max" ?></span>
        <span class="text">Summ: <?php echo" $sum" ?></span>
        <span class="text">AVG: <?php echo" $avg" ?></span>

    </div>
</body>

</html>