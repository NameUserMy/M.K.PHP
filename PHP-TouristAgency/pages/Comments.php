<?php
require_once 'Functions.php';
$connect = connect();
$option = getHotels($connect);
$test = '';


if (isset($_REQUEST['comment-b'])) {

    if ($_REQUEST['comment'] !== '') {
        $comment = trim(htmlspecialchars($_REQUEST['comment']));
        $hotelId = trim(htmlspecialchars($_REQUEST['hotelId']));
        $userId= $connect->query("SELECT id FROM users WHERE login='{$_SESSION['ruser']}'");
        $userId=$userId->fetch_assoc();
        $connect->query("INSERT INTO comments(comment,userId,hotelId) VALUES ('$comment',{$userId['id']},'$hotelId')");
        header('location:index.php?page=2');
        
    }
}


?>


<h2>Comments</h2>
<hr>
<form class='comment-form' method="POST">
    <select name="hotelId">
        <?php

        foreach ($option as $key => $value) {
            echo "<option value={$value['id']} >{$value['hotel']}</option>";
        }

        ?>
    </select>
    <textarea name="comment"></textarea>
    <input type="submit" name="comment-b" class="btn btn-sm btn-info" />
</form>