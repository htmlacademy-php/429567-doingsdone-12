<main class="content__main">
  <h2 class="content__main-heading">Добавление задачи</h2>

  <form class="form"  action="add.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="form__row">
      <label class="form__label" for="name">Название<sup>*</sup></label>
      
      <input class="form__input<?php if(isset($errorArray['name'])):?> form__input--error<?php endif;?>" type="text" name="name" id="name" value="<?= $_POST['name'];?>" placeholder="Введите название">
      <?php if(isset($errorArray['name'])):?><p class="form__message"><?= $errorArray['name']?> </p><?php endif;?>
    </div>

    <div class="form__row">
      <label class="form__label" for="project">Проект <sup>*</sup></label>

      <select class="form__input form__input--select<?php if(isset($errorArray['project'])):?> form__input--error<?php endif;?>" name="project" id="project">
      <?php
      foreach ($array_projects as $item) {?>
        <option value="<?= $item['id']?>"><?= $item['project']?></option>
        <?php
      }
      ?>
      
      </select>
      <?php if(isset($errorArray['project'])):?><p class="form__message"><?= $errorArray['project']?> </p><?php endif;?>
    </div>

    <div class="form__row">
      <label class="form__label" for="date">Дата выполнения</label>

      <input class="form__input form__input--date<?php if(isset($errorArray['date'])):?> form__input--error<?php endif;?>" type="text" name="date" id="date" value="<?= $_POST['date'];?>" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
      <?php if(isset($errorArray['project'])):?><p class="form__message"><?= $errorArray['project']?> </p><?php endif;?>
    </div>

    <div class="form__row">
      <label class="form__label" for="file">Файл</label>

      <div class="form__input-file">
        <input class="visually-hidden" type="file" name="file" id="file" value="">

        <label class="button button--transparent" for="file">
          <span>Выберите файл</span>
        </label>
      </div>
    </div>

    <div class="form__row form__row--controls">
      <input class="button" type="submit" name="add" value="Добавить">
    </div>
  </form>
</main>