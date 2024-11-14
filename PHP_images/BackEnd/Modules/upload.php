<?php

class UploadImg
{

    private string $uploadDir;
    private string $fileName;
    private string $src;

    public function SetDir(string $src)
    {
        $this->uploadDir = $src;
    }
    public function GetDir():string
    {
        return $this->uploadDir;
    }
    public function SetFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }
    public function GetFileName():string
    {
        return $this->fileName;
    }

    public function GetSrc():string
    {
        return $this->src;
    }

    public function SaveFile(){
        $this->src=$this->uploadDir.$this->fileName;
        move_uploaded_file($_FILES['uploadFile']['tmp_name'],$this->src);
    }
};
