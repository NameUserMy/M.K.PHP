<?php
require_once 'connectionDb.php';

class GetInfo{
    private $DB;
    private array $images;
    public function __construct()
    {
        ConnectDB::$pass = '';
        ConnectDB::$userNme = 'root';
        ConnectDB::$nameDB = 'images';
        $this->DB = ConnectDB::GetConnect();
        $this->images=array();
        
    }
    public function GetCountFile():int{

       $response=$this->DB->query("SELECT * FROM Pictures");
       return $response->rowCount();
    
    }

    public function &GetSrc():array{
        
        $response=$this->DB->query("SELECT * FROM Pictures");
        $rows=$response->fetchAll();

        foreach($rows as $key=>$value){
            array_push($this->images,$value[1]);
        }
       
        return $this->images;
     
     }
}






?>