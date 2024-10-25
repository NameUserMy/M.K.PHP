

<?php

function GetUser ($fileName){

    if (file_exists($fileName)) {
        $fileRead=fopen($fileName,"r");
        $size=filesize($fileName);
        if($size!=0){
            $users=fread($fileRead,filesize($fileName));
            fclose($fileRead);
            $users=preg_split("/\n/",$users);
            return $users; 

        }
    }
    return array();
}

?>