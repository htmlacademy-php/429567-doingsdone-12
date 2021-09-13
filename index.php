<?php
require_once ('settings.php');

if($array_projects != false) {
    $paramGet = $_GET;  
    if(isset($paramGet)){
        switch($paramGet['category']){
            case "projects":
                $array_info_task = get_tasks($con, ['user_id' => $userID[0]['id'], 'project_id' => $paramGet['id']]);
                if (empty($array_info_task)){
                    header("HTTP/1.0 404 Not Found");
                    exit;
                }
                break;
            case "":
                $array_info_task =  $array_info_task_main;
                break;
            default:
                header("HTTP/1.0 404 Not Found");
                exit;
            
        }
    }
    else {
        $array_info_task =  $array_info_task_main;
    }
}

$main = include_template ('main.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet]);

$page_content = include_template ('layout.php', ['title' => "Дела в порадке", 'main' => $main]);
print($page_content);
?>