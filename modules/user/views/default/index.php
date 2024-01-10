<?php

use yii\helpers\Url;
?>

<div class="module-default-index">
    <h1>Вітаємо на панелі управління!</h1>
    <p>Даний модуль дозволяє вам:</p>

    <div class="features">
        <div class="feature">
            <p>Управляти своїм обліковим записом</p>
            <a href="<?= Url::toRoute('/user/user/') ?>">
                Управління обліковим записом
            </a>
        </div>

        <div class="feature">
            <p>Переглядати та редагувати власні статті</p>
            <a href="<?= Url::toRoute('/user/article/') ?>">
                Перегляд та редагування статей
            </a>
        </div>
    </div>

</div>