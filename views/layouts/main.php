<?php

/** @var yii\web\View $this */
/** @var string $content */

// use app\models\User;
use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-dark bg-dark fixed-top']
        ]);

        $widget = [
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Головна', 'url' => ['/site/index']],
            ]
        ];

        // login and signup
        if (Yii::$app->user->isGuest) {
            $widget['items'][] = ['label' => 'Увійти', 'url' => ['/auth/login']];
            $widget['items'][] = ['label' => 'Зареєструватися', 'url' => ['/auth/signup']];
        } else {
            $user = Yii::$app->user->identity;
            //admin panel
            if ($user->isAdmin()) {
                $widget['items'][] = ['label' => 'Адмін панель', 'url' => ['/admin/default/index']];
            } else {
                $widget['items'][] = ['label' => 'Панель управління', 'url' => ['/user/default/index']];
            }

            $widget['items'][] = '<li class="nav-item">'
                . Html::beginForm(['/auth/logout'])
                . Html::submitButton(
                    'Вийти (' . $user->username . ')',
                    ['class' => 'nav-link btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }

        echo Nav::widget($widget);
        NavBar::end();
        ?>
    </header>

    <div class="container">
        <!--main content start-->
        <div class="main-content">
            <div class="container">
                <div class="row">
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <p class="pull-left">&copy; Kasianenko D <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>