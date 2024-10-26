<?php


class CountrySave
{


    private $Message = "";



    public function SetMessage(string $message): void
    {


        $this->Message = $message;
    }

    public function GetMessage(): string
    {


        return $this->Message;
    }

    private function check($country)
    {

        $fileName = ".\data\country.txt";
        if (filesize($fileName) != 0) {
            $fileRead = fopen($fileName, "r");
            $countries = fread($fileRead, filesize($fileName));
            fclose($fileRead);
            return preg_match("/{$country}/i", $countries);
        }
        return false;
    }

    public function save($country)
    {

        if (file_exists(".\data\country.txt")) {
            if ($this->check($country)) {
                $this->Message = "<span class=\"save-message\" style=\"color:red\">The country is already</span>";
                return;
            }
            $file = fopen(".\data\country.txt", 'a', 'FILE_APPEND');
            fwrite($file, "{$country}\r");
            fclose($file);
        } else {
            $file = fopen(".\data\country.txt", 'w');
            fwrite($file, "{$country}\r");
            fclose($file);
        }

        $this->Message = "<span class=\"save-message\" style=\"color:green\">The country save seccesful</span>";
        
    }
}
?>