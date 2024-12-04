<?=$this->extend("layouts/default");?>
<?= $this->section('content') ?>
<?php
if(session('admin')!==''){
    
    echo"Admin".session('admin');
}else if(session('user')!==''){

    echo session('user');
}else{

    echo"OUT";
}
?>
<?= $this->endSection() ?>