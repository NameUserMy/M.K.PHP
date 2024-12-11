<?php
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model {
    protected $table = 'users';
    protected $allowedFields = [
        'login', 'pass', 'email','roleid','avatar'
    ];

    protected $validationsRules=[
        'login'=>'required|min_length[6]',
        'pass'=>'required|min_length[6]',
        'repeatPass'=>'required|matches[pass]',
        'email'=>'required|valid_email'
    ];
    protected $returnType    = \App\Entities\User::class;
    
}

?>