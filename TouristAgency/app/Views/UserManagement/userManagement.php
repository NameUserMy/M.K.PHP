<?= $this->extend("layouts/default"); ?>
<?= $this->section('content') ?>
<section class="content-adm">
  
    <?= form_open('userManagement/SetAdmin', ['class' => 'userManagement-form','enctype'=>'multipart/form-data']) ?>
    <select name="picUser" id="">
        <option value='0'>
            Select user
        </option>
        <?php
        foreach ($users as $user) {
            echo " <option value={$user->id}>{$user->login}</option>";
        }

        ?>
    </select>
    <label for="file-upload" class="custom-file-upload">
            Select avatar
        </label>
         <input  id="file-upload" type="file" name='admAvatar' />
    <button type="submit" name="setAdmin">Set</button>
    <?= form_close() ?>
    <?php

foreach ($admin as $admin) {
   $img= base64_encode($admin->avatar);
    echo "<div class='view-adm-card'>
        <span>{$admin->login}</span>
        <span>{$admin->email}</span>
        <img width='50vw' height='50vh' src='data:image/jpeg; base64,{$img}' />
    </div>";
}

?>
    
    
</section>

<?= $this->endSection() ?>