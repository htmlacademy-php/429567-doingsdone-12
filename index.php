<?php
$con = mysqli_connect("localhost", "mysql", "", "doingsdone");
if ($con == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
 }
 else {
    $sql = "SELECT * FROM projects WHERE user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1')";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
    }
    else {
        $array_projects = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $sql = "SELECT * FROM tasks WHERE user_id = (SELECT u.id FROM users u WHERE u.userName = 'test1')";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            $error = mysqli_error($con);
            print("Ошибка MySQL: " . $error);
        }
        else {
            $array_info_task = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
            
    }
}
require_once ('helpers.php');
require_once ('config.php');
require_once ('functions.php');
$main = include_template ('main.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'show_complete_tasks' => $show_complete_tasks, 'timeleft' => $timeleft]);

$page_content = include_template ('layout.php', ['title' => "Дела в порадке", 'main' => $main]);
print($page_content);
?>