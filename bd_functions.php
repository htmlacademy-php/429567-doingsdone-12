<?php
$con = mysqli_connect($bd_inf['bd'], $bd_inf['user'], $bd_inf['password'], $bd_inf['bd_name']);
if ($con == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
    exit;
 }

$userID = getUser($con, ['userName' => 'test1']);
$array_projects = get_projects($con, ['user_id' => $userID[0]['id']]);
$array_info_task_main = get_tasks($con, ['user_id' => $userID[0]['id']]);


function sql_query_result ($db_connection, $sql){
    $sql_result = mysqli_query($db_connection, $sql);
    if (!$sql_result) {
        $error = mysqli_error($db_connection);
        print("Ошибка MySQL: " . $error);
        return false;
    }
    return mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
}

function getUser ($db_connection, $name){
    $sql = querySelect("*", "users", $name);
    return sql_query_result($db_connection, $sql);
}

function get_projects ($db_connection, $where) {
    $sql = querySelect("*", "projects", $where);
    return sql_query_result($db_connection, $sql);
}

function get_tasks ($db_connection, $where) {
    $sql = querySelect("*", "tasks", $where);
    return sql_query_result($db_connection, $sql);
}

function querySelect ($rows, $table, $where) {
    $sql = "SELECT ".$rows." FROM ".$table." WHERE ";
    foreach($where as $value=>$key){
        $sql .= $value."='".$key."' AND ";
    }
    $sql = substr($sql, 0, -5);
    return $sql;
    /* $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        return false;
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC); */
}
?>