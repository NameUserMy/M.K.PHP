<?php

class SaveData{

    public  function SaveFile(string $srcFile,$modelVotings)
    {
        $saveData=serialize($modelVotings);
        file_put_contents($srcFile,$saveData);
    }
}

?>

