<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>

<?= validation_list_errors() ?>

<?php
if(isset($successful)){
    echo $successful;
}
?>
    <?= form_open('registration/AddUser', ['class' => 'registration-form']) ?>
   
        <input type="text" placeholder="Enter Login" name="login" require size="6">
        <input type="password" placeholder="Enter Pass" name="pass">
        <input type="password" placeholder="Repeat pass" name="repeatPass">
        <input type="email" placeholder="Enter email" name="email">
        <button type="submit" class="btn btn-primary" name="regbtn">Register</button>
    <?= form_close() ?>
<?= $this->endSection() ?>