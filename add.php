<?php
require_once ('settings.php');
$errorArray =[];
$index = true;
if (isset($_POST['add'])) {
    $postParam = $_POST;
    $index = false;
    foreach($postParam as $key => $value) {
        if ($key == "name") {
            $errorArray[$key] = validateName($value);
        }
        if($key == "date"){
            $errorArray[$key] = validateDate($value);       
        }
        if($key == 'project') {
            $errorArray[$key] = validateProject($con, $value);
        }
    }
}
$errorArray = array_filter($errorArray);
$file_path = null;
if(count($errorArray) == 0 && $index == false){
    $sendArray = [];
    $file = $_FILES['file'];
    if($file['name'] !== "") {
        $file_path = __DIR__ . "\\".$file['name'];
        move_uploaded_file($file['tmp_name'], $file_path);
        
    }
    $sendArray = [
        'task' => $postParam['name'],
        'date_end' => $postParam['date'],
        'fileDir' => htmlspecialchars($file_path),
        'project_id' => $postParam['project'],
        'user_id' => 1,
        'status' => 0
    ];
    $resultAdd = add_tasks($con, $sendArray);
    if($resultAdd) {
        ob_start();
        $new_url = 'http://localhost/?file='.$file['name'];
        header('Location: '.$new_url);
        ob_end_flush();
        }
    else print_r("Ошибка добавления");
}

function validateName($name){
    $name = trim($name);
    if ($name == ""){
        return "Пустое поле";
    }
}

function validateDate($date){
    if ($date == ""){
        return "Пустое поле";
    }
    if (is_date_valid($date) == false)
        return "Неверный формат даты";
    $todayFormat = new DateTime("now");
    $datestart = new DateTime($date);
    if ($datestart < $todayFormat)
        return "Дата должна больше текущей даты";
    //$interval = date_diff($todayFormat, $datestart);
    //$result = $interval->format("%R%a")*24 + $interval->format("%R%h");
    //return $result;
}

function validateProject($con, $projectID) {
    if ($projectID == "")
        return "Пустое поле";
    $result = get_projects($con, ['id' => $projectID]);
    if(!isset($result))
        return "Не корректный проект - мухлюете!!!";
}

$side = include_template ('side.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main, 'paramGet' => $paramGet]);

$main = include_template ('add-task.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet, 'errorArray' => $errorArray]);

$page_content = include_template ('layout.php', ['title' => "Добавить задачу",'side' => $side, 'main' => $main]);
print($page_content);
?>