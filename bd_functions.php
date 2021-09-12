<?php
$con = mysqli_connect($bd_inf['bd'], $bd_inf['user'], $bd_inf['password'], $bd_inf['bd_name']);
if ($con == false) {
    print("Ошибка подключения: " . mysqli_connect_error());
 }
 else {
    $whereUserID =[
        'userName' => 'test1'
    ];
    $userID = querySelect($con, "id", "users", $whereUserID);
    $whereProjects = [
        'user_id' => $userID[0]['id']
    ];
    $array_projects = querySelect($con, "*", "projects", $whereProjects);
    $whereTasks = [
        'user_id' => $userID[0]['id']
    ];
    $array_info_task_main = querySelect($con, "*", "tasks", $whereTasks);
    if($array_projects != false) {
        $paramGet = $_GET;
        
        if(isset($paramGet)){
            switch($paramGet['category']){
                case "projects":
                    $whereCat = [
                        'user_id' => $userID[0]['id'],
                        'project_id' => $paramGet['id']
                    ];
                    $array_info_task = querySelect($con, "*", "tasks", $whereCat);
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
            
}

function querySelect ($con, $rows, $table, $where) {
    $sql = "SELECT ".$rows." FROM ".$table." WHERE ";
    foreach($where as $value=>$key){
        $sql .= $value."='".$key."' AND ";
    }
    $sql = substr($sql, 0, -5);
    $result = mysqli_query($con, $sql);
    if (!$result) {
        $error = mysqli_error($con);
        print("Ошибка MySQL: " . $error);
        return false;
    }
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>