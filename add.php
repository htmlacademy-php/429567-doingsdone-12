<?php
require_once ('settings.php');

if (isset($_POST)) {
    $postParam = $_POST;;
    $errorArray =[];
    foreach($postParam as $key => $value) {
        if ($key == "name") {
            $errorArray[$key] = validateName($value);
        }
        if($key == "date"){
            $errorArray[$key] = validateDate($value);       
        }
        if($key == 'project') {
            $errorArray[$key] = validateProject($value);
        }
    }
}
$errorArray = array_filter($errorArray);
echo "<pre>";
var_dump($errorArray);
echo "</pre>";

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

function validateProject($projectID) {
    if ($projectID == "")
        return "Пустое поле";
    $result = get_projects($con, ['id' => $projectID]);
    if(!isset($result))
        return "Не корректный проект - мухлюете!!!";
}

$side = include_template ('side.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main, 'paramGet' => $paramGet]);

$main = include_template ('add-task.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet]);

$page_content = include_template ('layout.php', ['title' => "Добавить задачу",'side' => $side, 'main' => $main]);
print($page_content);
?>