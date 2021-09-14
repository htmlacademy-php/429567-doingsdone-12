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
?>
