<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>
<section class="content-adm-hotel">
    <aside id='left-menu-hotel'>
        <ul>
        <a href="<?php echo site_url('/hotelManagement/country') ?>"><li>Country</li></a>
        <a href="<?php echo site_url('/hotelManagement/city') ?>"><li>City</li></a>
        <a href="<?php echo site_url('/hotelManagement/hotel') ?>"><li>Hotel</li></a>
        <a href="<?php echo site_url('/hotelManagement/photo') ?>"> <li>Photo</li></a>

        </ul>
    </aside>
    <section id='content-hotel'>
        <div class="wraper-content-hotel-managment">
            <?= form_open('hotelManagement/AddCountry', ['class' => 'edit']) ?>
            <span></span>
            <input type="text" name="countryInsrt" placeholder="Enter country" />
            <button type="submit" name="Addcountry">Add</button>
            <?= form_close() ?>
            
            <?php
            foreach($countries as $country){
                echo form_open('hotelManagement/UpdateCountry',['class' => 'edit-form']);
                echo "
                 <div class='edit'>
                <input type='radio' name='countryId' value={$country->id} /> 
                <input name='countryUpd' value={$country->country} type='text'/>
                <button name='updateCountry'>Confirm</button>
                <button name='deleteCountry'>Delete</button>
                </div>
                ";
                echo form_close();
            }
            ?>
            
            
        </div>
    </section>
</section>
<?= $this->endSection() ?>