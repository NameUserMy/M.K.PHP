<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>
<section class="content-comments">
  
   <span class='header-comment' >Comments</span>
   <?=form_open('comments',['id'=>'comment-form'])?>
   <?=form_dropdown('hotelId',$selectHotel)?>
   <?=form_textarea('commentInsr')?>
   <button type="submit" name="comment" >Confirm</button>
   <?=form_close()?>
</section>

<?= $this->endSection() ?>