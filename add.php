<?php
require_once ('settings.php');

if (isset($_POST)) {
    $postParam = $_POST;
    $errorArray =[];
    if (empty($postParam['name']))
        $errorArray['name'] = true;
    if (empty($postParam['date']))
        $errorArray['date'] = true;
}

$side = include_template ('side.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main, 'paramGet' => $paramGet]);

$main = include_template ('add-task.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet]);

$page_content = include_template ('layout.php', ['title' => "Добавить задачу",'side' => $side, 'main' => $main]);
print($page_content);
?>