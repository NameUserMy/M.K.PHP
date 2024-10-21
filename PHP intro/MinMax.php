<?php
require_once './Function/digitFunction.php';
$MinMaxArray=array();
for($i=0;$i<100;$i++){
     $MinMaxArray[$i]=rand(5,100);
}
$min=MinDigit($MinMaxArray);
$max=MaxDigit($MinMaxArray);




for($i=0;$i<100;$i++){
   if($i%25==0){
      echo"</br></br>";
   }
   if($MinMaxArray[$i]==$min || $MinMaxArray[$i]==$max ){

      echo "<span style=\"color:green;font-size:1.3em;\">$MinMaxArray[$i]".", </span> ";
   }else{

      echo "<span>$MinMaxArray[$i]".", </span> ";
   }
   
}
echo"</br></br>";
echo"Min "."<span style=\"color:green;font-size:1.3em;\">$min</span>";
echo"</br></br>";
echo"Max "."<span style=\"color:green;font-size:1.3em;\">$max</span>";

?>

