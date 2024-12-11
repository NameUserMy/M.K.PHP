<header>
    <nav class='header-nav'>
        <a >Tours</a>
        <a >Comments</a>
        <a href="<?php  echo site_url('/registration')?>">Registration</a>
    </nav>
    <?= form_open('loggin') ?>
        <input type="text" name="login" placeholder="Enter login" />
        <input type="password" name="pass" placeholder="Enter pass" />
        <button type="submit" value="loggin" name="loggin" >Loggin</button>
        
    <?= form_close() ?>
</header>