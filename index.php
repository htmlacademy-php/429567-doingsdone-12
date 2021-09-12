<?php
require_once ('settings.php');

$main = include_template ('main.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'array_info_task_main' => $array_info_task_main,'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft, 'paramGet' => $paramGet]);

$page_content = include_template ('layout.php', ['title' => "Дела в порадке", 'main' => $main]);
print($page_content);
?>