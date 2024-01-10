<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'date')->textInput() ?> -->
    <!-- Використовуємо текстове поле для дати та встановлюємо клас flatpickr на ньому -->
    <?= $form->field($model, 'date')->textInput(['class' => 'flatpickr']) ?>

    <!-- <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'topic_id')->dropDownList($topics) ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

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