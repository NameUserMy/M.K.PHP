<header>
    <nav class='header-nav'>
        <a href="<?php  echo site_url('/tours')?>" >Tours</a>
        <a href="<?php  echo site_url('/comments')?>" >Comments</a>
    </nav>
    <?= form_open('loggin') ?>
        <span class='greater'>Hello,</span>
        <span class='greater'><?php echo $whois;?></span>
        <input type="submit" value="logout" name="logout" />
    <?= form_close() ?>
</header>