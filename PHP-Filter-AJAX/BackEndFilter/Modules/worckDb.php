<?php


class Filter
{

    private array $response;
    private PDO $DB;

    public function __construct(PDO $db)
    {
        $this->response = array();
        $this->DB = $db;
    }
    public function forCheckBoxC(): array
    {


        $country = $this->DB->query("SELECT DISTINCT country  FROM employees");
        $rows = $country->fetchAll();
        foreach ($rows as $key => $value) {
            array_push($this->response, $value);
        }

        $city = $this->DB->query("SELECT DISTINCT city  FROM employees");
        $rows = $city->fetchAll();
        foreach ($rows as $key => $value) {
            array_push($this->response, $value);
        }


        return $this->response;
    }

    public function GetAllFilter(string $country, string $city, string $trigger = 'ASC', string $key = 'Country'): array
    {
       
       
        if (strlen($country)>1&&strlen($city)<=0) {

            $qwery = "SELECT * FROM employees  Where  country IN ($country) ORDER BY {$key} {$trigger}";
        } 
        
        if ($country === '' && $city !== '') {
            $qwery = "SELECT * FROM employees  Where  city IN ($city) ORDER BY {$key} {$trigger}";
        }
        if($country !== '' && $city !== ''){

            $qwery="SELECT * FROM employees  Where country IN ($country) AND city IN ($city) ORDER BY {$key} {$trigger}";
        }
        $allinfo = $this->DB->query($qwery);
        $rows = $allinfo->fetchAll();
        foreach ($rows as $key => $value) {
            array_push($this->response, $value);
        }
        return $this->response;
    }

    public function GetAllInfo(): array
    {
        $allinfo = $this->DB->query("SELECT * FROM employees");
        $rows = $allinfo->fetchAll();
        foreach ($rows as $key => $value) {
            array_push($this->response, $value);
        }
        return $this->response;
    }

    public function SortByAD(string $trigger, string $key): array
    {
        $orderInfo = $this->DB->query("SELECT * FROM employees ORDER BY {$key} {$trigger}");
        $rows = $orderInfo->fetchAll();
        foreach ($rows as $key => $value) {
            array_push($this->response, $value);
        }
        return $this->response;
    }
}
