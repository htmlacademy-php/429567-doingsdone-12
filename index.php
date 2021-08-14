<?php
require_once ('helpers.php');

// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$array_projects = ['Входящие','Учеба','Работа','Домашние дела', 'Авто'];
$array_info_task = [
    [
        'task' => 'Собеседование в IT компании',
        'date_start' => '01.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'task' =>'Выполнить тестовое задание',
        'date_start' => '25.12.2019',
        'category' => 'Работа',
        'status' => false
    ],
    [
        'task' => 'Сделать задание первого раздела',
        'date_start' => '25.12.2019',
        'category' => 'Учеба',
        'status' => true
    ],
    [
        'task' =>'Встреча с другом',
        'date_start' => '22.12.2019',
        'category' => 'Входящие',
        'status' => false
    ],
    [
        'task' => 'Купить корм для кота',
        'date_start' => null,
        'category' => 'Домашние дела',
        'status' => false
    ],
    [
        'task' => 'Заказать пиццу',
        'date_start' => null,
        'category' => 'Домашние дела',
        'status' => false
    ]
];
$main = include_template ('main.php', ['array_projects' => $array_projects, 'array_info_task' => $array_info_task, 'show_complete_tasks' => $show_complete_tasks]);

$page_content = include_template ('layout.php', ['title' => "Дела в порадке", 'main' => $main]);
print($page_content);
?>

