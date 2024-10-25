<?php


class UserSave
{


    public $SaveMessage = "";

    private function checkUser($login)
    {

        $fileName = ".\data\user.txt";
        if (filesize($fileName) != 0) {
            $fileRead = fopen($fileName, "r");
            $users = fread($fileRead, filesize($fileName));
            fclose($fileRead);
            return preg_match("/{$login}:/i", $users);
        }
        return false;
    }

    public function saveUser($user)
    {
        $login = preg_split("/:/", $user);
        if (file_exists(".\data\user.txt")) {
            if ($this->checkUser($login[0])) {
                $this->SaveMessage = "<span class=\"save-message\" style=\"color:red\">Login is already in use</span>";
                return;
            }
            $file = fopen(".\data\user.txt", 'a', 'FILE_APPEND');
            fwrite($file, $user);
            fclose($file);
        } else {
            $file = fopen(".\data\user.txt", 'w');
            fwrite($file, $user);
            fclose($file);
        }

        $this->SaveMessage = "<span class=\"save-message\" style=\"color:green\">Registration seccesful</span>";
    }
}
