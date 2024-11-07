<?php
require_once '../Model/task.php';
require_once '../Controller/todo-List.php';
require_once '../Controller/saveData.php';
require_once '../Controller/readData.php';
$data = new ReadDAta();
$tasks = new TODOList();
$saveData = new SaveData();
$stateList = array();

if ($data->Readfile('../Data/list') === false) {
    $saveData->SaveFile('../Data/list', $tasks);
} else {
    $tasks = $data->Readfile('../Data/list');
}




if (isset($_REQUEST['upDateTask'])) {
    for ($i = 0; $i < count($tasks->GetAllTasks()); $i++) {

        if (isset($_REQUEST['tasks' . $i])) {

            array_push($stateList, $_REQUEST['tasks' . $i]);
        }
    }

    if (count($stateList) > 0) {

        $tasks->upDateTask($stateList);
        $saveData->SaveFile('../Data/list', $tasks);
        
    }
    header('location:index.php');
    exit;
}


if (isset($_REQUEST['addTask'])) {

    $dateTemp = date_parse($_REQUEST['date']);
    $date = "{$dateTemp['day']}" . "." . "{$dateTemp['month']}" . "." . "{$dateTemp['year']}";
    $tasks->SetTask(new Task($_REQUEST['task'], $date, false));
    header('location:index.php');
}
$saveData->SaveFile('../Data/list', $tasks);
