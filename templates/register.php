<main class="content__main">
    <h2 class="content__main-heading">Регистрация аккаунта</h2>

    <form class="form" action="reg.php" method="post" autocomplete="off">
    <div class="form__row">
        <label class="form__label" for="email">E-mail <sup>*</sup></label>

        <input class="form__input <?php if(isset($errorArray['name'])):?> form__input--error<?php endif;?>" type="text" name="email" id="email" value="<?= $_POST['email'];?>" placeholder="Введите e-mail">

        <?php if(isset($errorArray['email'])):?> <p class="form__message"><?php echo $errorArray['email']?></p><?php endif;?>
    </div>

    <div class="form__row">
        <label class="form__label" for="password">Пароль <sup>*</sup></label>

        <input class="form__input <?php if(isset($errorArray['name'])):?> form__input--error<?php endif;?>" type="password" name="password" id="password" value="" placeholder="Введите пароль">
        <?php if(isset($errorArray['password'])):?> <p class="form__message"><?php echo $errorArray['password']?></p><?php endif;?>
    </div>

    <div class="form__row">
        <label class="form__label" for="name">Имя <sup>*</sup></label>

        <input class="form__input <?php if(isset($errorArray['name'])):?> form__input--error<?php endif;?>" type="text" name="name" id="name" value="<?= $_POST['name'];?>" placeholder="Введите имя">
        <?php if(isset($errorArray['name'])):?> <p class="form__message"><?php echo $errorArray['name']?></p><?php endif;?>
    </div>

    <div class="form__row form__row--controls">
    <?php if(count($errorArray)>0):?> <p class="error-message">Пожалуйста, исправьте ошибки в форме</p><?php endif;?>
        

        <input class="button" type="submit" name="reg" value="Зарегистрироваться">
    </div>
    </form>
</main>