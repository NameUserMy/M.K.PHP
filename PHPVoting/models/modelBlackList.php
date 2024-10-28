<?php

class BlackList
{
    private  array $blackList;
    function __construct()
    {
        $this->blackList = array();
    }
    public function &GetAllList(): array
    {
        return $this->blackList;
    }
}
?>
