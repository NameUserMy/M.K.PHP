<?php

namespace App\Controllers;

class CommentAdd extends BaseController
{
    private $hotel;
    private $optionHotel;
    private $user;
    private $db;
    public function __construct()
    {
        $this->hotel = model('HotelModel');
        $this->user = model('UserModel');
        $this->optionHotel['0'] = 'Please Select hotel';
        $this->optionHotel = array();
        $this->db = \Config\Database::connect();

    }
    public function index(): string
    {
        $hotels = $this->hotel->findAll();
        foreach ($hotels as $hotels) {
            $this->optionHotel[$hotels->id] = $hotels->hotel;
        }
        return view('/Comments/comments', ['hotel' => $hotels, 'selectHotel' => $this->optionHotel]);
    }
    public function AddComment()
    {
        $data = $this->request->getPost();
        $builder = $this->db->table('comments');
    
        if (isset($data['hotelId'])) {

            if ($data['hotelId'] !== '' && $data['commentInsr'] !== '') {
                if (session('user')!==null) {
                    $whoIs = $this->user->where('login', session('user'))->first();
                    $comnt=['comment'=>$data['commentInsr'],'userid'=>$whoIs->id,'hotelid'=>$data['hotelId']];
                    $builder->insert($comnt);
                    return redirect()->back();
                }else if (session('admin') !== null) {
                    $whoIs = $this->user->where('login', session('user'))->first();
                    $comnt=['comment'=>$data['commentInsr'],'userid'=>$whoIs->id,'hotelid'=>$data['hotelId']];
                    $builder->insert($comnt);
                    return redirect()->back();
                }
            }
       }
      return redirect()->back();
    }
}
