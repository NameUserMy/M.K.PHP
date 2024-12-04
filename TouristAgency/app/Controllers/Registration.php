<?php

namespace App\Controllers;

class Registration extends BaseController
{
    private $user;
    public function __construct()
    {
        $this->user = model('UserModel');
    }
    public function index(): string
    {
        return view('/Registration/registration');
    }
    public function AddUser()
    {
        helper('Registration');
        $data = $this->request->getPost();
        if (! $this->validateData($data, [
            'login' => 'required|min_length[6]',
            'pass' => 'required|min_length[6]',
            'repeatPass' => 'required|matches[pass]',
            'email' => 'required|valid_email'
        ])) {
            return view('/Registration/registration');
        } else {
            $login = $this->request->getPost('login');
            $pass = $this->request->getPost('pass');
            $email = $this->request->getPost('email');
            $hesh= password_hash($pass, PASSWORD_BCRYPT,[15]);
            $this->user->insert(['login' =>$login, 'pass' => $hesh, 'email' =>$email,'roleid' => 2]);
            $successful['successful'] = 'Registrations is successful';
            return view('/Registration/registration', $successful);
        }
        
    }
}
