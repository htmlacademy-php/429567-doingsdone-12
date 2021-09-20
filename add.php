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
        $file_path = __DIR__ . "/uploads/";
        $fileURL = "/uploads/".$file['name'];
        move_uploaded_file($file['tmp_name'], $file_path . $file['name']);
        
    }
    $sendArray = [
        'task' => $postParam['name'],
        'date_end' => $postParam['date'],
        'fileDir' => htmlspecialchars($file_path. $file['name']),
        'project_id' => $postParam['project'],
        'user_id' => 1,
        'status' => 0
    ];
    $resultAdd = add_tasks($con, $sendArray);
    if($resultAdd) {
        ob_start();
        header('Location: index.php');
        ob_end_flush();
        }
    else print_r("Ошибка добавления");
}

$side = include_template ('side.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main, 'paramGet' => $paramGet]);

$main = include_template ('add-task.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet, 'errorArray' => $errorArray]);

$page_content = include_template ('layout.php', ['title' => "Добавить задачу",'side' => $side, 'main' => $main]);
print($page_content);
?>