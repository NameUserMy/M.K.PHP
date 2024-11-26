<?php
include_once("functions.php");
$mysqli = connect();
$comments = getComment($mysqli, $_GET['hotel']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/infoMy.css">

	<title>Document</title>
</head>

<body>
	<main>
		<?php
		if (isset($_GET['hotel'])) {
			$hotel = $_GET['hotel'];
			$sel = 'select * from hotels where id=' . $hotel;
			$res = $mysqli->query($sel);
			$row = mysqli_fetch_array($res, MYSQLI_NUM);
			$hname = $row[1];
			$hstars = $row[4];
			$hcost = $row[5];
			$hinfo = $row[6];
			mysqli_free_result($res);
			echo '<h2 class="text-uppercase text-center">' . $hname . '</h2>';
			/***Galery****/
			$sel = 'select imagepath from images where hotelid=' . $hotel;
			$res = $mysqli->query($sel);
			echo '<span class="label label-info size">Watch our pictures</span>';
			echo '<ul id="gallery">';
			$i = 0;
			while ($row = mysqli_fetch_array($res, MYSQLI_NUM)) {
				echo '<li><img src="../' . $row[0] . '"></li>';
			}
			mysqli_free_result($res);
			echo '</ul>';
			/***Galery****/
			/***button star ****/
			echo "<div class='menu'>";
			for ($i = 0; $i < $hstars; $i++) {
				echo '<img src="../images/star.png" alt="star">';
			}
			echo '<h2 class="text-center">Cost&nbsp;<span class="label label-info">' . $hcost . ' $</span>';
			echo '<a href="#" class="btn btn-success">Book This Hotel</a></h2>';
			echo '</div>';
			/***button star ****/

			echo '<p class="well">' . $hinfo . '</p>';
			echo "<div class='comments'>";
			foreach ($comments as $key => $value) {
				$userName = $mysqli->query("SELECT login FROM users WHERE id='{$value['userId']}'");
				$userName = $userName->fetch_assoc();
				echo "<div class='info-comment' >
				<span>Name: {$userName['login']}</span>
				<span>Data: {$value['PutTime']}</span>
				</div>
				<div class='comment' >{$value['comment']}</div>";
			}
			echo "</div>";
		}

		?>
	</main>

	<script src="../js/jquery-3.1.0.min.js"></script>
	<script src="../js/gallery.js"></script>
	<script src="../js/info2.js"></script>
</body>

</html>


