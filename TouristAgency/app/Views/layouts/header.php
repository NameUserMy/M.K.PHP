<header>
    <nav class='header-nav'>
        <a>Tours</a>
        <a>Comments</a>
        <a href="<?php use App\Controllers\Registration; echo site_url('/registration')?>">Registration</a>
    </nav>
    <?= form_open('loggin') ?>
        <input type="text" name="login" placeholder="Enter login" />
        <input type="password" name="pass" placeholder="Enter pass" />
        <input type="submit" value="loggin" name="loggin" />
        <input type="submit" value="logout" name="logout" />
    <?= form_close() ?>
</header>