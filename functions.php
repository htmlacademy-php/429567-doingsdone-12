<?php

function countTask($arrayCountTask, $id)
{
    $index = 0;
    foreach ($arrayCountTask as $task) {
        if ($task['project_id'] == $id) {
            $index++;
        }
    }
    return $index;
}

function dateLeft($dateInsert) {
    $todayFormat = new DateTime("now");

    if ($dateInsert != null) {
        $datestart = new DateTime($dateInsert);
        $interval = date_diff($todayFormat, $datestart);
        $result = $interval->format("%R%a")*24 + $interval->format("%R%h");
        return $result;
    }
    else
        return false;
}

function validateName($name){
    $name = trim($name);
    if ($name == ""){
        return "Пустое поле";
    }
}

function validateDate($date){
    if ($date == ""){
        return "Пустое поле";
    }
    if (is_date_valid($date) == false)
        return "Неверный формат даты";
    $todayFormat = new DateTime("now");
    $datestart = new DateTime($date);
    if ($datestart < $todayFormat)
        return "Дата должна больше текущей даты";
    //$interval = date_diff($todayFormat, $datestart);
    //$result = $interval->format("%R%a")*24 + $interval->format("%R%h");
    //return $result;
}

function validateProject($con, $projectID) {
    if ($projectID == "")
        return "Пустое поле";
    $result = get_projects($con, ['id' => $projectID]);
    if(count($result) == 0)
        return "Не корректный проект - мухлюете!!!";
}

function validateEmail($con, $email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'E-mail введён некорректно';
    }
    $result = getUser($con, ['email' => $email]);
    if (count($result) > 0)
        return "Такой Email уже существует";
}

function validatePassword($pas) {
    $pas = trim($pas);
    if(strlen($pas) == 0 || strlen($pas) < 6)
        return "Пароль пустой или меньше 6 символов";
}
?>
