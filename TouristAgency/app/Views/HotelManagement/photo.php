<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>
<section class="content-adm-hotel">
    <aside id='left-menu-hotel'>
        <ul>
            <a href="<?php echo site_url('/hotelManagement/country') ?>">
                <li>Country</li>
            </a>
            <a href="<?php echo site_url('/hotelManagement/city') ?>">
                <li>City</li>
            </a>
            <a href="<?php echo site_url('/hotelManagement/hotel') ?>">
                <li>Hotel</li>
            </a>
            <a href="<?php echo site_url('/hotelManagement/photo') ?>">
                <li>Photo</li>
            </a>
        </ul>
    </aside>
    <section id='content-hotel'>
        <div class="wraper-content-managment">
            <fieldset>
                <legend>Add photo for Hotel:</legend>
                <?= form_open('hotelManagement/AddPhoto', ['class' => 'hotel-form-photo', 'enctype' => 'multipart/form-data']) ?>
                <select name='hotelId'>
                    <?php
                    foreach ($hotels as $hotel) {
                        echo "<option value={$hotel->id}>{$hotel->country} {$hotel->city} {$hotel->hotel}</option>";
                    }
                    ?>
                </select>
                <label for="file-upload" class="custom-file-upload">
                    Select photo
                </label>
                <input id="file-upload" type="file" name="photoHotel[]" multiple accept="images/*" />
                <button type="submit" name="AddPhoto">Add</button>
                <?= form_close() ?>
            </fieldset>
        </div>
    </section>
</section>
<?= $this->endSection() ?>