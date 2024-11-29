<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
require_once './Functions.php';
$mysqli = connect();

if(isset($_REQUEST['countries'])){

    $countries=array();
	$mysqli->real_query("SELECT * FROM countries ORDER BY country");
	$rows = $mysqli->use_result();
	foreach ($rows as $key => $value) {
		array_push($countries,$value);
	}
echo json_encode($countries, JSON_UNESCAPED_UNICODE);
exit;

}

if(isset($_REQUEST['cityid'])&&isset($_REQUEST['countryid'])){

    $hotels=array();
	$mysqli->real_query("SELECT co.country, ci.city, ho.hotel, ho.cost, ho.stars, ho.id  FROM hotels ho, cities ci, countries co  WHERE ho.cityid=ci.id  AND ho.countryid=co.id AND ho.cityid={$_REQUEST['cityid']}");
	$rows = $mysqli->use_result();
  	foreach ($rows as $key => $value) {
		array_push($hotels,$value);
	}
    echo json_encode($hotels, JSON_UNESCAPED_UNICODE);
   
exit;
}

if(isset($_REQUEST['countryid'])){

    $cities=array();
	$mysqli->real_query("SELECT * FROM cities where countryid=" . $_REQUEST['countryid'] . " ORDER BY city");
	$rows = $mysqli->use_result();
	foreach ($rows as $key => $value) {
		array_push($cities,$value);
	}
echo json_encode($cities, JSON_UNESCAPED_UNICODE);
exit;
}
?>

