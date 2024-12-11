<header>
    <nav class='header-nav'>
        <a href="<?php echo site_url('/tours') ?>">Tours</a>
        <a href="<?php  echo site_url('/comments')?>" >Comments</a>
        <a href="<?php echo site_url('hotelManagement/country') ?>">Hotel menegnet</a>
        <a href="<?php echo site_url('/userManagement') ?>">User managment</a>

    </nav>
    <?= form_open('loggin', ['class' => 'logout-form']) ?>
    <span class='greater'>Hello,</span>
    <span class='greater'><?php echo $whois . '.'; ?></span>
    <button type="submit" value="logout" name="logout">logout</button>
    <?= form_close() ?>
</header>