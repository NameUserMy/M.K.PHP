<?php

class ReadDAta
{
    public function Readfile($fileName)
    {

        if ((bool)file_exists($fileName) === true) {
            $s = file_get_contents($fileName);
            $a = unserialize($s);
            return $a;
        } else {

            return false;
        }
    }
}
