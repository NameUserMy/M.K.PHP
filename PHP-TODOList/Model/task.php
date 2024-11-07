<?php

class Task
{

    public function __construct(public string $description,public string $date,public bool $state)
    {
        
    }
}
