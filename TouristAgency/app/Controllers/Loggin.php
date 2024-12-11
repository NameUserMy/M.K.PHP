<?php

namespace App\Controllers;

class Loggin extends BaseController
{
    private $user;
    public function __construct()
    {
        $this->user = model('UserModel');
    }
    public function loggin()
    {
        $log = $this->request->getPost('loggin');
        if ($log !== null) {
            if ($this->request->getPost('loggin') === 'loggin') {
                $data = $this->request->getPost();
                $whoIs = $this->user->where('login',$data['login'])->first();
                if(password_verify($data['pass'],$whoIs->pass)){
                    
                    if($whoIs->roleid==2){
                        session()->remove('admin');
                        session()->set('user',$whoIs->login);
                    }
                    if($whoIs->roleid=='1')
                    {
                        session()->remove('user');
                        session()->set('admin',$whoIs->login);

                    }
                }
            }
        }
        $log1 = $this->request->getPost('logout');

        if($log1!== null){
           
           session()->destroy();
        }
        return redirect('/');
        
        
    }
}
