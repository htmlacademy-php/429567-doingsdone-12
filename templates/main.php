<main class="content__main">
    <h2 class="content__main-heading">Список задач</h2>
    <?php if($_GET['file']):?><p><a href="<?= $_GET['file']?>">Вы добавили файл</a></p><?php endif;?>

    <form class="search-form" action="index.php" method="post" autocomplete="off">
        <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

        <input class="search-form__submit" type="submit" name="" value="Искать">
    </form>

    <div class="tasks-controls">
        <nav class="tasks-switch">
            <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
            <a href="/" class="tasks-switch__item">Повестка дня</a>
            <a href="/" class="tasks-switch__item">Завтра</a>
            <a href="/" class="tasks-switch__item">Просроченные</a>
        </nav>

        <label class="checkbox">
            <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
            <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if($show_complete_tasks == 1): ?>checked<?php endif;?>>
            <span class="checkbox__text">Показывать выполненные</span>
        </label>
    </div>

    <table class="tasks">
        <?php
        foreach ($array_info_task as $value) {
            if($value['status'] == true && $show_complete_tasks == 0) {
                continue;
            }
            $datestart = dateLeft ($value['date_start']);

        ?>
        <tr class="tasks__item task <?php if ($datestart !=false && $datestart < $timeleft):?>task--important<?php endif; ?>">
            <td class='task__select <?php if($value['status'] == true):?>task--completed<?php endif; ?>'>
                <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                    <span class="checkbox__text"><?= htmlspecialchars($value['task']);?></span>
                </label>
            </td>

            <td class="task__file">
                <a class="download-link" href="<?= $value['fileDir']?>">Home.psd</a>
            </td>
                <td class="task__date "><?= htmlspecialchars($value['date_start']);?></td>
        </tr>
        <?php
        }
        ?>
        <!--показывать следующий тег <tr/>, если переменная $show_complete_tasks равна единице-->
        <?php if($show_complete_tasks == 1): ?>
            <tr class="tasks__item task task--completed">
                <td class="task__select">
                    <label class="checkbox task__checkbox">
                    <input class="checkbox__input visually-hidden" type="checkbox" checked>
                    <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
                    </label>
                </td>
                <td class="task__date">10.10.2019</td>

                <td class="task__controls">
                </td>
            </tr>
        <?php endif;?>
    </table>
</main>
