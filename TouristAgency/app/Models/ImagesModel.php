<?php
namespace App\Models;
use CodeIgniter\Model;
class ImagesModel extends Model {
    protected $table = 'images';
    protected $allowedFields = [
        'imagepath', 
        'hotelid'
    ];
    protected $returnType    = \App\Entities\Images::class;
    
}

?>