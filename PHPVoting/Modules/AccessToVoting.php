<?php


class AccesVoting
{



    public function IsAccess(array $list, string $incommingData)
    {

 
        $usersData = preg_split("/;/", $incommingData);

        if(array_key_exists($usersData[0],$list)){

            if($list[$usersData[0]]<=$usersData[1]){

                return true;

            }else{

                return false; 
            }


        }else{return true;}
    }
}