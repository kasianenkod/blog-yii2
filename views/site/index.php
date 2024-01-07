<?php

/** @var yii\web\View $this */

$this->title = 'Blog';
?>
<div class="col-md-8">
    <article class="post">
        <div class="post-thumb">
            <a href=""><img class="img-index" src="" alt="Image"></a>
        </div>
        <div class="post-content">
            <header class="entry-header text-center text-uppercase">
                <h6><a href=""> Блог</a></h6>
                <h1 class="entry-title"><a href=""> Поради по здоровому харчуванню </a></h1>
            </header>
            <div class="entry-content">
                <p>
                    Даний блог є платформою для розміщення статей та дописів з порадами по здоровому харчуванню.
                </p>
                <div class="btn-continue-reading text-center text-uppercase">
                    <a href="#" class="more-link">До статей</a>
                </div>
            </div>
            <div class="social-share">
                <span class="social-share-title pull-left text-capitalize"> Kasianenko D, <?= date('Y'); ?> </span>
                <ul class="text-center pull-right">
                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li>
                    10
                </ul>
            </div>
        </div>
    </article>
    <ul class="pagination">
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
    </ul>
</div>

<?php
echo \Yii::$app->view->renderFile('@app/views/site/right.php');
?>
