<?php

namespace App\Controllers;

class Hotels extends BaseController
{

    private $hotel;
    private $image;
    private $comment;
    public function __construct()
    {
        $this->hotel = model('HotelModel');
        $this->image = model('ImagesModel');
        $this->comment = model('CommentsModels');
    }
    public function index(): string
    {
       
        $data = $this->request->getPostGet();
        if (isset($data['hotels'])) {
            if ($data['hotels'] !== '') {
                $hotel = $this->hotel->where('id', $data['hotels'])->first();
                $hotelImg = $this->image->where('hotelid', $hotel->id)->find();
                $comments= $this->comment->where('hotelId',$hotel->id)->join('users','comments.userId=users.id')->findAll();
                return view('/Hotels/hotels', ['hotel' => $hotel, 'img' => $hotelImg,'comments'=>$comments]);
            }
        }
        return view('/Hotels/hotels');
    }
}
