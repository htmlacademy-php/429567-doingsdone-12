<?php
require_once ('config.php');
require_once ('bd_functions.php');
require_once ('helpers.php');
require_once ('functions.php');

$con = mysqli_connect($bd_inf['bd'], $bd_inf['user'], $bd_inf['password'], $bd_inf['bd_name']);
if ($con == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
    exit;
}
$userID = getUser($con, ['userName' => 'test1']);
$array_projects = get_projects($con, ['user_id' => $userID[0]['id']]);
$array_info_task_main = get_tasks($con, ['user_id' => $userID[0]['id']]);
?>