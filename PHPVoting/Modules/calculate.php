<?php
class CalculateVoting
{
    private float $AllUser=0;
    private float $CplusPlus=0;
    private float $CSharp=0;
    private float $Java=0;
    private float $PHP=0;
    private float $Python=0;
    private float $JavaScript=0;


    public function GetPlusPlus(): float
    {
        return $this->CplusPlus;
    }
    public function GetSharp(): float
    {
        return $this->CSharp;
    }
    public function GetJava(): float
    {
        return $this->Java;
    }
    public function GetPHP(): float
    {
        return $this->PHP;
    }
    public function GetPython(): float
    {
        return $this->Python;
    }
    public function GetJS(): float
    {
        return $this->JavaScript;
    }

    public function Calculate(array $data): void
    {

        if($data['allVotings']===0){
          return;

        }
        $this->AllUser=$data['allVotings'];
        $procent = $this->AllUser/100;
        $this->CplusPlus=round($data['C++']/$procent,2); 
        $this->CSharp=round($data['C#']/$procent,2); 
        $this->Java=round($data['Java']/$procent,2); 
        $this->PHP=round($data['PHP']/$procent,2); 
        $this->Python=round($data['Python']/$procent,2);
        $this->JavaScript=round($data['JavaScript']/$procent,2);     
    }
}
