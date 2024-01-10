<?php

use app\models\Article;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */

$this->title = 'Додати коментар';
$this->params['breadcrumbs'][] = ['label' => 'Коментарі', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'articles' => ArrayHelper::map(Article::find()->all(), 'id', 'title'),
    ]) ?>

</div>