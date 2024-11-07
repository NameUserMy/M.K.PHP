<?php

class TODOList
{

    private array $todoList;
    private array $todoListDay;
    private array $todoListWeek;
    private array $todoListMonth;


    function __construct()
    {
        $this->todoList = array();
    }

    public function &GetAllTasks(): array
    {
        return $this->todoList;
    }

    public function SetTask(Task $task)
    {
        array_push($this->todoList, $task);
    }
    public function &GetTasksDay(string $date): array
    {
        $this->todoListDay = array();
        foreach ($this->todoList as $key => $value) {

            if ($value->date === $date) {


                array_push($this->todoListDay, $value);
            }
        }
        return $this->todoListDay;
    }
    public function &GetTasksWeek(string $date): array
    {
        $this->todoListWeek = array();
        for ($i = 0; $i < 8; $i++) {
            $dateTemp = date_parse($date);
            $dateTemp['day'] += $i;
            $date1 = "{$dateTemp['day']}" . "." . "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";

            foreach ($this->todoList as $key => $value) {
                if ($value->date === $date1) {
                    array_push($this->todoListWeek, $value);
                }
            }
        }


        return $this->todoListWeek;
    }

    public function &GetTasksMonth(string $date): array
    {

        $this->todoListMonth = array();
        $dateTemp = date_parse($date);
        $date1 = "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";

        foreach ($this->todoList as $key => $value) {

            if (str_contains($value->date, $date1)) {
                array_push($this->todoListMonth, $value);
            }
        }

        return $this->todoListMonth;
    }
    public function UpdateTask(array $taskId)
    {

        foreach ($taskId as $key => $value) {



            switch ($value[1]) {

                case 'd':
                    array_splice($this->todoList, $value[0]);
                    break;
                case 'f':
                    $this->todoList[$value[0]]->state = false;
                    break;
                case 't':
                    $this->todoList[$value[0]]->state = true;
            }
        }
    }
}
