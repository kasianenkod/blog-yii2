<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->
    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

    <!-- <?= $form->field($model, 'comment_id')->textInput() ?> -->

    <?= $form->field($model, 'article_id')->dropDownList($articles) ?>

    <!-- <?= $form->field($model, 'date')->textInput() ?> -->
    <!-- Використовуємо текстове поле для дати та встановлюємо клас flatpickr на ньому -->
    <?= $form->field($model, 'date')->textInput(['class' => 'flatpickr']) ?>

    <!-- <?= $form->field($model, 'delete')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Зберегти', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<!-- Додаємо скрипт для ініціалізації Flatpickr -->
<?php
$this->registerJs('
    flatpickr(".flatpickr", {
        dateFormat: "Y-m-d", // Формат дати
    });
');
?>