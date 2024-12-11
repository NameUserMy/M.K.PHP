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
            <?= form_open('hotelManagement/AddCity', ['class' => 'edit-city']) ?>
            <Select name='countryId'>
                <option>Select country</option>
                <?php
                foreach ($countries as $country) {
                    echo "<option value={$country->id}>{$country->country}</option>";
                }
                ?>

            </Select>
            <input type="text" name="cityInsrt" placeholder="Enter city" />
            <button type="submit" name="AddCity">Add</button>
            <?= form_close() ?>
           
            <?php
            foreach ($cities as $city) {
                echo form_open('hotelManagement/UpdateCity', ['class' => 'edit-form']);
                echo "
                 <div class='edit' >
                <input type='radio' name='CityId' value={$city->id} /> 
                <input name='CityUpd' value={$city->city} type='text'/>
                <button name='updateCity'>Confirm</button>
                <button name='deleteCity'>Delete</button>
                </div>
                ";
                echo form_close();
            }
            ?>
           
        </div>
    </section>
</section>
</section>
<?= $this->endSection() ?>