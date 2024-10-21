<?php
$rate = 0.2;
$deposit = 300;
$year=1;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Deposit</title>
</head>

<body>
    <div id='deposit'>
        <span class="border">Year</span>
        <span class="border">Deposit </span>
        <span class="border">Deposit+profit</span>
        <span class="border">profit</span>
        <?php
        for ($i = 0; $i < 20; $i++) {
            $profit = $deposit * $rate;
            $result = $deposit + $profit;
            echo "<span class=\"border\" >$year</span>";
            echo "<span class=\"border\" >$deposit</span>";
            echo "<span class=\"border\" >$result</span>";
            echo "<span class=\"border\" >$profit</span>";
            $deposit = $result;
            $year++;
        }
        ?>
    </div>
</body>

</html>