<?php

abstract  class Control
{


    private  string $backGround;
    private  string $width;
    private  string $height;

    protected function GetBackground():string
    {
        return $this->backGround;
    }

    protected function SetBackground(string $backGround)
    {
        $this->backGround = $backGround;
    }
    protected function GetWidth():string
    {
        return $this->width;
    }

    protected function SetWidth(string $width)
    {
        $this->width = $width;
    }
    protected function GetHeight():string
    {
        return $this->height;
    }

    protected function SetHeight(string $height)
    {
        $this->height = $height;
    }

    abstract public function GetElement();
}
