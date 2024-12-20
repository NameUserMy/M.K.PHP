<?php
session_start();
include_once("pages/functions.php");
if (isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = "";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Travel Agency</title>
</head>

<body>

   
   

    <main class="container">
    <header class="col-sm-12 col-md-12 col-lg-12">
        <?php include_once("pages/login.php"); ?>
    </header>
        <div class="row">
            <nav class="col-sm-12 col-md-12 col-lg-12 head">
                <?php
                include_once('pages/menu.php');
                ?>
            </nav>
        </div>
        <div class="row">
            <section class="col-sm-12 col-md-12 col-lg-12">
                <?php
                if (isset($_GET['page'])) {
                    if ($page == 1 && isset($_SESSION['ruser'])) include_once("pages/tours.php");
                    if ($page == 2 && isset($_SESSION['ruser'])) include_once("pages/comments.php");
                    if ($page == 3) include_once("pages/registration.php");
                    if ($page == 4 && isset($_SESSION['ruser'])) include_once("pages/admin.php");
                    if ($page == 5 && isset($_SESSION['radmin']))
                        include_once("pages/private.php");
                }
                ?>
            </section>
        </div>

    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
   
</body>

</html>