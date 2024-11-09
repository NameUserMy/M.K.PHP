<?php
require_once 'control.php';
class Label extends Control
{


    private string $for;
    private string $title;
    public function __construct(string $_background, string  $_width, string $_height, Input $forObj, string $title)
    {
        $this->SetBackground($_background);
        $this->SetWidth($_width);
        $this->SetHeight($_height);
        $this->SetParentName($forObj);
        $this->SetTitle($title);
    }


    protected function SetParentName(Input $name)
    {
        $this->for = $name->GetName();
    }
    protected function GetParentName(): string
    {
        return $this->for;
    }
    protected function SetTitle(string $title)
    {
        $this->title = $title;
    }
    protected function GetTitle(): string
    {
        return $this->title;
    }


    public function GetElement()
    {

        echo "<label for='{$this->GetParentName()}' style='background:{$this->GetBackground()}; whidth:{$this->GetWidth()}' height:{$this->GetHeight()} >{$this->GetTitle()}</label>";
    }
}
