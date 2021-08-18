<?php

function countTask($arrayCountTask, $name)
{
    $index = 0;
    foreach ($arrayCountTask as $task) {
        if ($task['category'] == $name) {
            $index++;
        }
    }
    return $index;
}

function dateLeft($dateInsert) {
    $todayFormat = strtotime("now");
    if ($dateInsert != null) {
        $datestart = strtotime($dateInsert);
        return $todayFormat-$datestart;
    }
    else
        return false;
}
?>
