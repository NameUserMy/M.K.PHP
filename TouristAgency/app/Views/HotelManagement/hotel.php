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
    <div class="wraper-content-managment">
    <fieldset>
    <legend>Add Hotel:</legend>
            <?= form_open('hotelManagement/AddHotel', ['class' => 'hotel-form']) ?>
            <select name='cityId'>
                <?php
                foreach($CountryCyti as $city){
                    echo"<option value={$city->id}>{$city->country}: {$city->city} </option>";
                }
                ?>
            </select>
            <input type="text" name="hotelInsrt" placeholder="Enter Hotel" />
            <input type="number" name="price" placeholder="Enter price" />
            <input type="number" name="stars" placeholder="Enter starts count" />
            <textarea name='description'></textarea>
            <button type="submit" name="Addhotel">Add</button>
            <?= form_close() ?>

           
            </fieldset>
            <?php
            
            foreach($hotels as $hotel){
                echo form_open('hotelManagement/UpdateHotel',['class' => 'edit-form']);
                echo "
                 <div class='edit-hotel'>
                <input type='radio' name='hotelId' value={$hotel->id} /> 
                <input name='hotelUpd' size='40' value='$hotel->hotel' type='text'/>
                <button name='updateHotel'>Confirm</button>
                <button name='deleteHotel'>Delete</button>
                <span>{$hotel->city} {$hotel->country}</span>
                </div>
                ";
                echo form_close();
            }
            ?>
            
            
        </div>
    </section>
</section>
<?= $this->endSection() ?>