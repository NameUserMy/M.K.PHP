<?php

namespace App\Models;

use CodeIgniter\Model;

class HotelModel extends Model
{
    protected $table = 'hotels';
    protected $allowedFields = [
        
        'hotel',
        'cityid',
        'countryid',
        'stars',
        'cost',
        'info'
    ];
    protected $returnType    = \App\Entities\Hotel::class;
}


