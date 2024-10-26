<?php

class ReadCity
{
    public static function Readfile($fileName)
    {
        if (file_exists($fileName)) {
            $fileRead = fopen($fileName, "r");
            $size = filesize($fileName);
            if ($size != 0) {
                $Cities = fread($fileRead, filesize($fileName));
                fclose($fileRead);
                $Cities = preg_split("/(\n|\r)/",$Cities,-1,PREG_SPLIT_NO_EMPTY);

                return $Cities;
            }
        }
        return array();
    }
}
