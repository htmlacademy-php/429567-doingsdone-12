<section class='content__side'>
    <h2 class='content__side-heading'>Проекты</h2>

    <nav class="main-navigation">
        <ul class="main-navigation__list">
            <?php

            foreach ($array_projects as $array_item) {?>
            <li class="main-navigation__list-item<?php if($paramGet['id'] == $array_item['id']):?> main-navigation__list-item--active<?php endif;?>">
                <a class="main-navigation__list-item-link" href="/?category=projects&id=<?= $array_item['id']?>"><?= htmlspecialchars($array_item['project']);?></a>
                <span class="main-navigation__list-item-count"><?= countTask($array_info_task_main, $array_item['id']);?></span>
            </li>
            <?php
            }?>
        </ul>
    </nav>

    <a class="button button--transparent button--plus content__side-button"
       href="pages/form-project.html" target="project_add">Добавить проект</a>
</section>