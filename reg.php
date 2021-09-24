<?php
require_once ('settings.php');
$errorArray =[];
$index = true;
if (isset($_POST['reg'])) {
    $postParam = $_POST;
    $index = false;
    foreach($postParam as $key => $value) {
        if ($key == "email") {
            $errorArray[$key] = validateEmail($con, $value);
        }
        if($key == "password"){
            $errorArray[$key] = validatePassword($value);       
        }
        if($key == 'name') {
            $errorArray[$key] = validateName($value);
        }
    }
}
$errorArray = array_filter($errorArray);


if(count($errorArray) == 0 && $index == false){
    $sendArray = [];
    $sendArray = [
        'email' => $postParam['email'],
        'userName' => $postParam['name'],
        'password' => password_hash($postParam['password'], PASSWORD_DEFAULT)
    ];
    $resultAdd = add_user($con, $sendArray);
    if($resultAdd) {
        ob_start();
        header('Location: index.php');
        ob_end_flush();
        }
    else print_r("Ошибка добавления");
}

$side = include_template ('side.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main, 'paramGet' => $paramGet]);

$main = include_template ('register.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet, 'errorArray' => $errorArray]);

$page_content = include_template ('layout.php', ['title' => "Регистрация",'side' => $side, 'main' => $main]);
print($page_content);
?>