<?php

namespace App\Controllers;

use App\Entities\City;

class Tours extends BaseController
{
    private $country;
    private $city;
    private $hotel;
    private $selectedCountry;
    private $selectedCity;
    private $optionCountry;
    private $optionCity;
    public function __construct()
    {
        $this->country = model('CountryModel');
        $this->city = model('CityModel');
        $this->hotel = model('HotelModel');
       
        $this->selectedCountry = 0;
        $this->selectedCity = 0;
        $this->optionCountry = array();
        $this->optionCity = array();
    }
    public function index(): string
    {
        $this->optionCountry['0'] = 'Please Select country';
        $country = $this->country->findAll();
        foreach ($country as $country) {
            $this->optionCountry[$country->id] = $country->country;
        }
        return view('/Tours/tours', ['countries' => $this->optionCountry, 'selectedCountry' => $this->selectedCountry]);
    }
    public function SelectCity()
    {

        $this->optionCity['0'] = 'Please Select city';
        $country = $this->country->findAll();
        foreach ($country as $country) {
            $this->optionCountry[$country->id] = $country->country;
        }
        $data = $this->request->getPost();
        if (isset($data['countryId'])) {
            if (isset($data['cityId']) && isset($data['countryId'])) {
                $city = $this->city->where('countryid', $data['countryId'])->findAll();
                $this->selectedCountry = $data['countryId'];
                foreach ($city as $city) {
                    $this->optionCity[$city->id] = $city->city;
                }
                if ($data['cityId'] !== 0 && $data['countryId'] !== 0) {
                    $this->selectedCity = $data['cityId'];

                    $hotelsData=$this->country->
                    where('cityid',$data['cityId'])->
                    join('cities','cities.countryid=countries.id')->
                    join('hotels','cities.id=hotels.cityid')->findAll();
                    
                    
                    // $this->hotel->where('cityid',$data['cityId'])->join('countries','countries.id=hotels.countryid')->join('cities','cities.id=hotels.cityid')->findAll();


                    return view('/Tours/tours', [
                        'countries' => $this->optionCountry,
                        'cities' => $this->optionCity,
                        'selectedCountry' => $this->selectedCountry,
                        'selectedcity' => $this->selectedCity,
                        'hotelsInfo'=>$hotelsData
                    ]);
                }
            }
            if ($data['countryId'] !== 0) {
                $city = $this->city->where('countryid', $data['countryId'])->findAll();
                $this->selectedCountry = $data['countryId'];
                foreach ($city as $city) {
                    $this->optionCity[$city->id] = $city->city;
                }
                return view('/Tours/tours', ['countries' => $this->optionCountry, 'cities' => $this->optionCity, 'selectedCountry' => $this->selectedCountry, 'selectedcity' => $this->selectedCity]);
            }
        }
    }
}
