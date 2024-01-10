<?php

use yii\helpers\Url;
?>

<div class="module-default-index">
    <h1>Вітаємо на панелі адміністратора!</h1>
    <p>Даний модуль дозволяє вам:</p>

    <div class="features">
        <div class="feature">
            <p>Управляти користувачами блогу</p>
            <a href="<?= Url::toRoute('/admin/user/') ?>">
                Управління користувачами
            </a>
        </div>

        <div class="feature">
            <p>Переглядати та редагувати статті</p>
            <a href="<?= Url::toRoute('/admin/article/') ?>">
                Перегляд та редагування статей
            </a>
        </div>

        <div class="feature">
            <p>Працювати з категоріями</p>
            <a href="<?= Url::toRoute('/admin/topic/') ?>">
                Категорії статей
            </a>
        </div>

        <div class="feature">
            <p>Та коментарями до статей</p>
            <a href="<?= Url::toRoute('/admin/comment') ?>">
                Коментарі до статей
            </a>
        </div>
    </div>

</div>