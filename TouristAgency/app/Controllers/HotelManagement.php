<?php

namespace App\Controllers;

class HotelManagement extends BaseController
{
    private $country;
    private $city;
    private $hotel;
    private $image;
    public function __construct()
    {
        $this->country = model('CountryModel');
        $this->city = model('CityModel');
        $this->hotel = model('HotelModel');
        $this->image = model('ImagesModel');
    }
   
#region Country    
    public function country(): string
    {
        $data = $this->country->findAll();
        return view('/HotelManagement/country', ['countries' => $data]);
    }
    public function AddCountry()
    {
        $request = $this->request->getPost();
        if (isset($request['Addcountry'])) {
            $this->country->insert(['country' => $request['countryInsrt']]);
            return redirect()->back();
        }
    }
    public function UpdateCountry()
    {
        $request = $this->request->getPost();
        if (isset($request['updateCountry'])) {

            if(isset($request['countryId'])){
                $this->country->where('id',$request['countryId'])->set('country',$request['countryUpd'])->update();
                return redirect()->back();
            }
            return redirect('/');
            
        }else if(isset($request['deleteCountry'])){

            if(isset($request['countryId'])){
                $this->country->where('id',$request['countryId'])->delete();
                return redirect()->back();
            }
            return redirect('/');
        }
    }
#end region

#region City
    public function city(): string
    {
        $data = $this->country->findAll();
        $dataCity = $this->city->findAll();
        return view('/HotelManagement/city',['countries' => $data,'cities'=>$dataCity]);
    }


    public function AddCity()
    {
        $request = $this->request->getPost();
        if (isset($request['AddCity'])) {
            if(isset($request['countryId']) && isset($request['cityInsrt'])){
                $this->city->insert(['city' => $request['cityInsrt'],'countryid'=>$request['countryId']]);
                return redirect()->back();
            }
           
        }
    }

    public function UpdateCity()
    {
        $request = $this->request->getPost();
        if (isset($request['updateCity'])) {
           
            if(isset($request['CityId'])){
                $this->city->where('id',$request['CityId'])->set('city',$request['CityUpd'])->update();
                return redirect()->back();
            }
            return redirect('/');
            
        }else if(isset($request['deleteCity'])){

            if(isset($request['CityId'])){
                $this->city->where('id',$request['CityId'])->delete();
                return redirect()->back();
            }
            return redirect('/');
        }
    }
#end region

#region Hotel
    public function hotel(): string
    {
       
        $data=$this->country->join('cities','cities.countryid=countries.id')->findAll();
        $hotelsData=$this->hotel->join('countries','countries.id=hotels.countryid')->join('cities','cities.id=hotels.cityid')->findAll();
       
      return view('/HotelManagement/hotel',['CountryCyti'=>$data,'hotels'=>$hotelsData]);
    }

    public function AddHotel()
    {
        $request = $this->request->getPost();
        if (isset($request['Addhotel'])) {
            if($request['cityId']!=='' && $request['hotelInsrt']!==''&&$request['price']!==''&&$request['stars']!==''&&$request['description']!==''){
                $countryId=$this->city->where('id',$request['cityId'])->first();
                $this->hotel->insert(['hotel' => $request['hotelInsrt'],
                'cityid'=>$request['cityId'],
                'countryid'=>$countryId->countryid,
                'stars'=>$request['stars'],
                'cost'=>$request['price'],
                'info'=>$request['description']
                ]);
                return redirect()->back();
            }
            return redirect('/');
        }
    }
    public function UpdateHotel()
    {
        $request = $this->request->getPost();
        if (isset($request['updateHotel'])) {
           
            if(isset($request['hotelId'])){
                $this->hotel->where('id',$request['hotelId'])->set('hotel',$request['hotelUpd'])->update();
                return redirect()->back();
            }
            return redirect('/');
            
        }else if(isset($request['deleteHotel'])){

            if(isset($request['hotelId'])){
                $this->city->where('id',$request['hotelId'])->delete();
                return redirect()->back();
            }
            return redirect('/');
        }

    }
#end region

#region Photo
    public function photo(): string
    {
        $data=$this->country->
        join('cities','cities.countryid=countries.id')->
        join('hotels','cities.id=hotels.cityid')->findAll();
        return view('/HotelManagement/photo',['hotels'=>$data]);
    }

    public function AddPhoto()
    {
        $request = $this->request->getPost();
        if (isset($request['AddPhoto'])) {

            if(isset($request['hotelId'])){
                
                foreach($_FILES['photoHotel']['name'] as $k => $v)
				{
					if($_FILES['photoHotel']['error'][$k] !=0)
					{
						echo '<script>alert("Upload	file error:'.$v.'")</script>';
						continue;
					}
					if(move_uploaded_file($_FILES['photoHotel']['tmp_name'][$k],'images/'.$v))
					{
                        $path='images/'.$v;
						$this->image->insert(['imagepath'=>$path,'hotelid'=>$request['hotelId']]);
					}
				}
                return redirect()->back();
            }
            
        }
    }
#end region
}
 //TODO Photo Coutry hotel