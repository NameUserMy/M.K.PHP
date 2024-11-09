<?php
require_once 'input.php';
class Button extends Input
{

    public function __construct(string $_background, string $_width, string $_height, string $_name, string $_value)
    {
        $this->SetBackground($_background);
        $this->SetWidth($_width);
        $this->SetHeight($_height);
        $this->SetName($_name);
        $this->SetValue($_value);
    }

    public function GetElement(){

        echo"<input  type='submit' name='{$this->GetName()}' value='{$this->GetValue()}'
        style='background:{$this->GetBackground()}; whidth:{$this->GetWidth()}' height:{$this->GetHeight()}/>";

    }
    
}
