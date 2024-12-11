<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModels extends Model
{
    protected $table = 'comments';
    protected $primaryKey='id';
    protected $allowedFields = [
        'comment',
        'userId',
        'hotelId',
        'PutTime'
    ];

    protected $returnType = \App\Entities\Comments::class;
    protected $useTimestamps = true;
    protected $dateFormat='datetime';
    protected $useEntity=true;
}


