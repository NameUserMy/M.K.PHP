<?php
require_once 'input.php';
class Text extends Input
{


    private string $textPlaceholder;

    public function __construct(string $_background, string $_width, string $_height, string $_name, string $_value, string $_placeholder )
    {
        $this->SetBackground($_background);
        $this->SetWidth($_width);
        $this->SetHeight($_height);
        $this->SetName($_name);
        $this->SetValue($_value);
        $this->SetPlaceholder($_placeholder);
    }
    protected function SetPlaceholder(string $textPlaceholder)
    {
        $this->textPlaceholder = $textPlaceholder;
    }
    protected function GetPlaceholder(): string
    {
        return $this->textPlaceholder;
    }
    public function GetElement()
    {

        echo "<input  type='text' placeholder='{$this->GetPlaceholder()}'  name='{$this->GetName()}' value='{$this->GetValue()}'
        style='background:{$this->GetBackground()}; whidth:{$this->GetWidth()}' height:{$this->GetHeight()}/>";
    }
}
