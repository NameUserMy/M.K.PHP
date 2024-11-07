<?php
require_once '../Controller/todo-List.php';
require_once '../Model/task.php';
require_once '../Controller/readData.php';
require_once '../Controller/saveData.php';
$data = new ReadDAta();
$tasks = new TODOList();
$saveData = new SaveData();
if ($data->Readfile('../Data/list') === false) {
    $saveData->SaveFile('../Data/list', $tasks);
} else {
    $tasks = $data->Readfile('../Data/list');
}

$tasksview = $tasks->GetAllTasks();


?>


<?php

if (isset($_REQUEST['filter'])) {

    $tasks = $data->Readfile('../Data/list');

    if (isset($_REQUEST['filterd']) && $_REQUEST['datefilter'] != '') {
        switch ($_REQUEST['filterd']) {
            case 'd':
                $dateTemp = date_parse($_REQUEST['datefilter']);
                $date = "{$dateTemp['day']}" . "." . "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";
                $tasksview = $tasks->GetTasksDay($date);
                break;
            case 'w';
                $dateTemp = date_parse($_REQUEST['datefilter']);
                $date = "{$dateTemp['day']}" . "." . "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";
                $tasksview = $tasks->GetTasksWeek($date);
                break;
            case 'm':
                $dateTemp = date_parse($_REQUEST['datefilter']);
                $date = "{$dateTemp['day']}" . "." . "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";
                $tasksview = $tasks->GetTasksMonth($date);
                break;
        }
    } else {

        $tasksview = $tasks->GetAllTasks();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TODO-List</title>
</head>

<body>
    <main>
         <?php 
         
         $today = getdate();
         $Date="{$today['mday']}" . "." . "{$today['mon']}" . "." . "{$today['year']}";
        echo"<span>$Date</span>"; 
         
         ?> 
        <!----------------------search Task----------------------->
        <form method="POST" class="search-tasks">
            <input type="date" name='datefilter' /> <button type="submit" name="filter">Показать задачи</button>
            <div>
                <input type='radio' title='Удалить' id='d' name='filterd' value='d' />
                <label for='d'>День</label>
            </div>

            <div>
                <input type='radio' title='Удалить' id='w' name='filterd' value='w' />
                <label for='w'>Нелеля</label>
            </div>
            <div>
                <input type='radio' title='Удалить' id='m' name='filterd' value='m' />
                <label for='m'>Месяц</label>
            </div>

        </form>
         <!----------------------view Task----------------------->
        <form id='form-task-list' method="POST" action="./addTask.php">
            <div class="tasks-list">

                <?php

                foreach ($tasksview as $key => $value) {
                    $checked = $value->state ? 'checked' : '';
                    echo "
                <span class='task'>
                    <input type='checkbox' disabled {$checked} '/>
                    <span>{$value->description}</span>
                    <span>{$value->date}</span>
                    <div>
                    <input type='radio' title='Отметить готово' id='Check' name='tasks{$key}' value='{$key}true'/>
                    <label for='Check'>Готово</label>
                    </div>
                    <div>
                    <input type='radio' title='Отметить не готово' id='False'  name='tasks{$key}' value='{$key}false'/>
                    <span for='False'>Отметить</span>
                    </div>
                    <div>
                    <input type='radio' title='Удалить' id='Delete'  name='tasks{$key}' value='{$key}del'/>
                     <label for='Delete'>Удалить</label>
                     </div>
                </span>";
                }
                ?>

            </div>
            <button type='submit' name='upDateTask'>Обновить изменение</button>
        </form>
        <!----------------------Add Task----------------------->
        <form method="POST" action="./addTask.php" class="add-task">
            <textarea name="task">
            </textarea>
            <span>
                <input type="date" name='date' require />
                <button type="submit" name="addTask">Добавить задачу</button>
            </span>
        </form>
    </main>
</body>

</html>