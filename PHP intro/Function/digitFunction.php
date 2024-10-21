<?php

function Digit($number, &$arrayDigit)
{
    $tempNum = (string)$number;
    for ($i = 0; $i < strlen($tempNum); $i++) {
        $arrayDigit[$i] = (int)$tempNum[$i];
    }
    return $arrayDigit;
};

function MinDigit($arrayDigit)
{

    $min = $arrayDigit[0];

    foreach ($arrayDigit as $value) {

        if ($value < $min) {

            $min = $value;
        };
    }
    return $min;
};

function MaxDigit($arrayDigit)
{

    $max = $arrayDigit[0];

    foreach ($arrayDigit as $value) {

        if ($value > $max) {

            $max = $value;
        };
    }
    return $max;
};

function SumDigit($arrayDigit)
{

    $sum = 0;
    foreach ($arrayDigit as $value) {

        $sum += $value;
    }
    return $sum;
}

function AvgDigit($arrayDigit){

$count=count($arrayDigit);
$sum=SumDigit($arrayDigit);
return $sum/$count;
}
