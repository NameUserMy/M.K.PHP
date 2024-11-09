<?php
require_once 'control.php';

class Input extends Control
{

    private string $name;
    private string $value;
    public function GetName():string
    {


        return $this->name;
    }

    protected function SetName(string $name)
    {
        $this->name = $name;
    }
    protected function GetValue():string
    {
        return $this->value;
    }

    protected function SetValue(string $value)
    {
        $this->value = $value;
    }

    public function GetElement(){

        echo"<input  name='{$this->GetName()}' value='{$this->GetValue()}'
        style='background:{$this->GetBackground()}; whidth:{$this->GetWidth()}' height:{$this->GetHeight()}/>";

    }
}
