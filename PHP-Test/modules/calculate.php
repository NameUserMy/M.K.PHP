<?php

class Calculate
{

    private array $_answerTest1;
    private array $_answerTest2;
    private array $_answerTest3;
    private int $_resultTest1;
    private int $_resultTest2;
    private int $_resultTest3;
    private array $testA1;
    private array $testA2;
    private array $testA3;
    private Tests $tests;

    private  const MAX_POINT1 = 1;
    private  const MAX_POINT2 = 3;
    private  const MAX_POINT3 = 5;

    public function __construct()
    {
        $this->_resultTest1 = 0;
        $this->_resultTest2 = 0;
        $this->_resultTest3 = 0;
        $this->_answerTest1 = array();
        $this->_answerTest2 = array();
        $this->_answerTest3 = array();
        $this->tests = new Tests();
        $this->testA1 = $this->tests->GetTest1();
        $this->testA2 = $this->tests->GetTest2();
        $this->testA3 = $this->tests->GetTest3();
    }

    public function SetAnswer(int $answer)
    {
        array_push($this->_answerTest1, $answer);
    }

    public function SetAnswer2(array $answer)
    {
        array_push($this->_answerTest2, $answer);
    }
    public function SetAnswer3(string $answer)
    {
        array_push($this->_answerTest3, $answer);
    }


    public function GetResult1(): int
    {
        $index = 0;
        $MaxIndex = count($this->_answerTest1);
        foreach ($this->testA1 as $value => $key) {

            $questions = $this->testA1[$value][count($this->testA1[$value]) - 1];
            if ($this->_answerTest1[$index] === $questions && $index < $MaxIndex) {
                $this->_resultTest1 += self::MAX_POINT1;
                
            }
            $index++;
        };
        return $this->_resultTest1;
    }

    public function GetResult2(): int
    {
        $index = 0;
        foreach ($this->testA2 as $value => $key) {
            $realAnswer = 0;
            foreach ($this->testA2[$value]['answer'] as $key => $valueA) {

                for ($j = 0; $j < count($this->_answerTest2[$index]); $j++) {

                    if ($this->testA2[$value]['answer'][$key] == $this->_answerTest2[$index][$j]) {

                        $realAnswer++;
                    }
                }
            }

            if (count($this->testA2[$value]['answer']) === $realAnswer) {

                $this->_resultTest2 += self::MAX_POINT2;
            }

            $index++;
        };

        return $this->_resultTest2;
    }

    public function GetResult3(): int
    {

        foreach ($this->testA3 as $key => $value) {
            $result = array_search($value, $this->_answerTest3);
            if ($result !== false) {
                $this->_resultTest3 += self::MAX_POINT3;
            }
        }
        return $this->_resultTest3;
    }
}
