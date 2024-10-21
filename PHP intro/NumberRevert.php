<?php
$num = 347689;
echo "<span style=\"color:orange\">$num</span> </br>";

$result = Revert($num);

echo "<span style=\" color:green\">$result</span>";


function Revert($numbur)
{
    $temp = (string)$numbur;
    $g = strlen($temp);
    $revertNum = "";

    for ($i = $g - 1; $i != -1; $i--) {
        $revertNum .= $temp[$i];
    };

    return $revertNum;
}
