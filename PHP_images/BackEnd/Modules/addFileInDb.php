<?php

require_once 'connectionDb.php';


class AddFileDB
{

    private $DB;
    private string $nameFile;
    private int $sizeFile;
    private string $pathFile;
    
    public function __construct()
    {
        ConnectDB::$pass = '';
        ConnectDB::$userNme = 'root';
        ConnectDB::$nameDB = 'images';
        $this->DB = ConnectDB::GetConnect();
    }
    public function SetName(string $name)
    {
        $this->nameFile = $name;
    }
    public function SetSize(int $size)
    {
        $this->sizeFile = $size;
    }
    
    public function SetpathFile(string $pathFile)
    {
        $this->pathFile = $pathFile;
    }
    public function AddData(){
        $this->DB->exec(
            "INSERT INTO Pictures (Name,SIZE,ImagePath) VALUES ('{$this->nameFile}','{$this->sizeFile}','{$this->pathFile}')"
        );
    }


}
