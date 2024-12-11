<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>
<section class="content-hotels">

    <section class="info-hotels-more">
        <span class='header-hotel-info'><?php echo $hotel->hotel ?></span>
        <span id="photo-hotel">
            <?php
            if (isset($img)) {
                foreach ($img as $img) {
                    $imgUrl = base_url() . $img->imagepath;
                    echo "<img src={$imgUrl} class='img-photo' alt='photo' id='{$img->id}'/>";
                    echo "<a class='link-img' href='#{$img->id}'></a>";
                }
            }

            ?>
        </span>
        <span class='stars-price-hotel'>
            <?php

            $stars = base_url() . 'images/star/star.png';
            for ($i = 0; $i < $hotel->stars; $i++) {
                echo "<img src={$stars}></img>";
            }
            echo "Cost " . " " . $hotel->cost . " $";
            ?>
        </span>
        <span class="description-hotel"><?php echo  $hotel->info ?></span>
    </section>
    <section class="comments">

       
        <?php
        foreach ($comments as $comment) {

            echo"
            <div class='comment'>
                <span class='dateName'>{$comment->login}, {$comment->PutTime}</span>
                <span class='commentU'>{$comment->comment}</span>
            </div>";
        }
        ?>
    </section>
</section>

<?= $this->endSection() ?>