<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>

<section class="tours-info">
    <fieldset>
        <legend>Select Tours</legend>
        <?= form_open('tours', ['class' => 'select-tour', 'id' => 'tours-form']) ?>
        <?= form_dropdown('countryId', [$countries], $selectedCountry, "id='countryOpt'") ?>
        <?php
        if (isset($cities)) {
            if (count($cities) > 1) {
                echo form_dropdown('cityId', [$cities], $selectedcity, "id='cityOpt'");
            }
        }
        ?>
        <?= form_close() ?>
    </fieldset>
    <?php
    ?>

    <div id=header-tours>
        <span>Hotel</span> <span>Country</span> <span>City</span> <span>Price</span> <span>Starts</span> <span>More</span>
    </div>
    <?php
    
    if(isset($hotelsInfo)){
        if(count($hotelsInfo)>0){

            foreach($hotelsInfo as $hotelsInfo){
                
                $link=site_url('/hotels')."?hotels=$hotelsInfo->id";
                echo "
                <div id='all-info-hotel'>
                   <span>$hotelsInfo->hotel</span> 
                   <span>$hotelsInfo->country</span> 
                   <span>$hotelsInfo->city</span> 
                   <span>$hotelsInfo->cost</span> 
                   <span>$hotelsInfo->stars</span> 
                   <span><a href={$link} >Link</a></span>
               </div>
               ";
            }
          
        }
    }
    
    
    ?>
   
</section>

<!-- ["1"=>'Country','2'=>'Country2'] -->

<?= $this->endSection() ?>