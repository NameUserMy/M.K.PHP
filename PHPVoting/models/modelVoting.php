
<?php

class Voting{

    private  array $voiting;
    function __construct()
    {
       $this->voiting=array('allVotings'=>0,'C++'=>0,'C#'=>0,'Java'=>0,'PHP'=>0,'Python'=>0,'JavaScript'=>0);
    }
    public function &GetAllVotings():array{
        return $this->voiting;
    }
}



?>