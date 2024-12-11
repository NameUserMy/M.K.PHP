<?php

namespace App\Controllers;

class UserManagement extends BaseController
{

    private $user;
    public function __construct()
    {
        $this->user = model('UserModel');
    }
    public function userManagement(): string
    {
        $users = $this->user->where('roleid', '2')->findAll();
        $adm = $this->user->where('roleid', '1')->findAll();
        return view('/UserManagement/userManagement', ['users' => $users, 'admin' => $adm]);
    }

    public function SetAdmin()
    {

        $data = $this->request->getPost();
        if ($data['picUser'] !== '0') {
           $this->AddAvatar($data['picUser']);
            return redirect()->back();
        }
    }
    private function AddAvatar($userId)
    {
        $imgava = $_FILES['admAvatar']['tmp_name'];
        $file = fopen($imgava, 'rb');
        $img = fread($file, filesize($imgava));
        fclose($file);
        $this->user->where('id',$userId)->set('avatar',$img)->set('roleid',1)->update();
    }
}



