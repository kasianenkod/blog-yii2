<?php

use yii\helpers\Url;
?>
<div class="col-md-8">
	<article class="post">
		<div class="post-thumb">
			<a href="blog.html"><img src="" alt=" image "></a>
		</div>
		<div class="post-content">
			<header class="entry-header text-center text-uppercase">
				<h6>
					<a href=""> Поради по здоровому харчуванню </a>
				</h6>
				<h1 class="entry-title"><a href="blog.html"> Home is peaceful place </a></h1>
			</header>
			<div class="entry-content">
				Text.
			</div>
			<div class="decoration">
				<a href="" class="btn btn-default">Tag</a>
			</div>
			<div class="social-share">
				<span class="social-share-title pull-left text-capitalize">Kasianenko D, <?= date('Y'); ?></span>
				<ul class="text-center pull-right">
					<li><a class="s-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::base('http'); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a class="s-twitter" href="https://twitter.com/intent/tweet?url=<?= Url::base('http'); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a class="s-google-plus" href="https://plus.google.com/share?url=<?= Url::base('http'); ?>"><i class="fa fa-google-plus"></i></a></li>
					<li><a class="s-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::base('http'); ?>"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</article>
</div>
<?php
echo \Yii::$app->view->renderFile('@app/views/site/right.php');
?>