<?php
function sql_query_result ($db_connection, $sql){
    $sql_result = mysqli_query($db_connection, $sql);
    if (!$sql_result) {
        $error = mysqli_error($db_connection);
        print("Ошибка MySQL: " . $error);
        return false;
    }
    return mysqli_fetch_all($sql_result, MYSQLI_ASSOC);
}
function sql_query_resultAdd ($db_connection, $sql){
    $sql_result = mysqli_query($db_connection, $sql);
    return $sql_result;
}

function getUser ($db_connection, $name){
    $sql = querySelect("*", "users", $name);
    $result = sql_query_result($db_connection, $sql);
    if (isset($result))
        return $result;
    return false;
}

function get_projects ($db_connection, $where) {
    $sql = querySelect("*", "projects", $where);
    $result = sql_query_result($db_connection, $sql);
    if (isset($result))
        return $result;
    return false;
}

function get_tasks ($db_connection, $where) {
    $sql = querySelect("*", "tasks", $where);
    $result = sql_query_result($db_connection, $sql);
    if (isset($result))
        return $result;
    return false;
}

function add_tasks ($db_connection, $arrayValues) {
    $sql = queryAdd("tasks", $arrayValues);
    $result = sql_query_resultAdd($db_connection, $sql);
    return $result;
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

function queryAdd ($table, $arrayValues) {
    $sql = "INSERT INTO ".$table." SET ";
    foreach($arrayValues as $key=>$value){
        $sql .= $key."='".$value."', ";
    
    }
    $sql = substr($sql, 0, -2);
    return $sql;
}
?>