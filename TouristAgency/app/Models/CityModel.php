<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'cities';
    protected $allowedFields = [
        'city','countryid'
    ];
    protected $returnType    = \App\Entities\City::class;
}


