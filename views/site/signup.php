<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

// use yii\helpers\Html;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Реєстрація';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Щоб зареєструватися, заповніть наступні поля:</p>

	<div class="row">
		<div class="col-lg-5">

			<?php
			// $form = ActiveForm::begin([
			// 		'id' => 'login-form',
			// 		'layout' => 'horizontal',
			// 		'fieldConfig' => [
			// 			'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
			// 			'labelOptions' => ['class' => 'col-lg-1 control-label'],
			// 		],
			// 	]); 
			?>

			<?php $form = ActiveForm::begin([
				'id' => 'login-form',
				'fieldConfig' => [
					'template' => "{label}\n{input}\n{error}",
					'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
					'inputOptions' => ['class' => 'col-lg-3 form-control'],
					'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
				],
			]); ?>

			<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
			<?= $form->field($model, 'login')->textInput() ?>
			<?= $form->field($model, 'password')->passwordInput() ?>

			<div class="form-group">
				<div class="col-lg-offset-1 col-lg-11">
					<?= Html::submitButton(' Зареєструватися ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					<?= Html::a('Увійти', ['/auth/login'], ['class' => 'btn btn-success']) ?>
				</div>


			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>