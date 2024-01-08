<?php

use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'Blog';
?>
<div class="col-md-8">
    <?php foreach ($articles as $article) : ?>
        <article class="post">
            <div class="post-thumb">
                <a href=""><img class="img-index" src="<?= $article->getImage() ?>" alt="Image"></a>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6><a href=""> <?= $article->topic->name; ?></a></h6>
                    <h1 class="entry-title"><a href=""> <?= $article->title; ?> </a></h1>
                </header>
                <div class="entry-content">
                    <p> <?= mb_strimwidth($article->description, 0, 360, "..."); ?> </p>
                    <div class="btn-continue-reading text-center text-uppercase">
                        <a href="<?= Url::toRoute(['/view', 'id' => $article->id]) ?>" class="more-link">Читати далі</a>
                    </div>
                </div>
                <div class="social-share">
                    <!-- text-capitalize-->
                    <span class="social-share-title pull-left "> Автор: <?= $article->user->name; ?>, опубліковано <?= $article->getDate(); ?> </span>
                    <ul class="text-center pull-right">
                        <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li>
                        <?= (int)$article->viewed; ?>
                    </ul>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
    <!-- <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul> -->
    <?php
    echo \yii\widgets\LinkPager::widget([
        "pagination" => $pagination,
    ]);
    ?>
</div>

<?php
echo \Yii::$app->view->renderFile(
    '@app/views/site/right.php',
    compact('popular', 'recent', 'topics')
);
?>
