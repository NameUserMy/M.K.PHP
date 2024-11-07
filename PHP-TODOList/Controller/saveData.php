<?php

class SaveData{

    public  function SaveFile(string $srcFile,$model)
    {
        $saveData=serialize($model);
        file_put_contents($srcFile,$saveData);
    }
}

?>

