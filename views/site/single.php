<?php

use yii\helpers\Url;
?>
<div class="col-md-8">
	<article class="post">
		<div class="post-thumb">
			<a href="blog.html">
				<img src="<?= $article->getImage() ?>" alt="image">
			</a>
		</div>
		<div class="post-content">
			<header class="entry-header text-center text-uppercase">
				<h6>
					<a href="<?= Url::toRoute(['/topic', 'id' => $article->topic->id]) ?>">
						<?= $article->topic->name; ?>
					</a>
				</h6>
				<h1 class="entry-title">
					<a href=" blog.html"><?= $article->title; ?></a>
				</h1>
			</header>
			<div class="entry-content">
				<?= $article->description; ?>
			</div>
			<div class="decoration">
				<?php foreach (preg_split("/[\s,]+/", $article->tag) as $tag) : ?>
					<a href="/search?SearchForm[text]=<?= str_replace('#', '', $tag) ?>" class="btn btn-default"><?= $tag ?></a>
				<?php endforeach; ?>

			</div>
			<div class="social-share">
				<!-- text-capitalize -->
				<span class="social-share-title pull-left">Автор: <?= $article->user->name; ?>, опубліковано <?= $article->getDate(); ?></span>
				<ul class="text-center pull-right">
					<li><a class="s-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::base('http'); ?>"><i class="fa fa-facebook"></i></a></li>
					<li><a class="s-twitter" href="https://twitter.com/intent/tweet?url=<?= Url::base('http'); ?>"><i class="fa fa-twitter"></i></a></li>
					<li><a class="s-google-plus" href="https://plus.google.com/share?url=<?= Url::base('http'); ?>"><i class="fa fa-google-plus"></i></a></li>
					<li><a class="s-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?= Url::base('http'); ?>"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>
	</article>

	<?php $form = \yii\widgets\ActiveForm::begin([
		'action' => ['site/comment', 'id' => $article->id],
		'options' => ['class' => '', 'role' => 'form']
	]) ?>
	<div class="leave-comment"><!--leave comment-->
		<h4>Залишити відповідь</h4>
		<form class="form-horizontal contact-form" role="form" method="post" action="#">
			<div class="form-group">
				<div class="col-md-12">
					<?= $form->field($commentForm, 'comment')->textarea([
						'class' => 'form-control',
						'placeholder' => 'Write Message'
					])->label(false) ?>
				</div>
			</div>
			<button type="submit" class="btn send-btn">Опублікувати коментар</button>
			<?php \yii\widgets\ActiveForm::end() ?>
		</form>
	</div><!--end leave comment-->

	<?php if (!empty($commentsParent)) : ?>
		<div class="comments-block">
			<?php foreach ($commentsParent as $comment) : ?>
				<div class="comment-block">
					<?php if (!$comment->delete) : ?>
						<div class="comment">
							<a href="#" class="comment-img">
								<img class="img-round" src="<?php
															if ($comment->user) {
																echo $comment->user->getImage();
															} else {
																echo '/no-image-available.jpg';
															}
															?>" alt="">
							</a>
							<div class="comment-body">
								<div class="comment-top">
									<button class="replay btn pull-right" onclick="ShowReplay(this)"> Відповісти
									</button>
									<h5><?php if ($comment->user) {
											echo $comment->user->name;
										} else {
											echo 'Гість';
										} ?>
									</h5>
									<p class="comment-date">
										<?= $comment->getDate(); ?>
									</p>
								</div>
								<div class="comment-text">
									<?= $comment->text; ?>
								</div>
								<?php if ($comment->user_id && $comment->user_id == Yii::$app->user->id) : ?>
									<?php $form = \yii\widgets\ActiveForm::begin([
										'action' => ['site/comment-delete', 'id' => $article->id, 'id_comment' => $comment->id],
										'options' => ['class' => '', 'role' => 'form']
									]) ?>
									<div class="comment-delete">
										<button type="submit">
											<i class="fa fa-trash"></i>
										</button>
									</div>
									<?php \yii\widgets\ActiveForm::end() ?>
								<?php endif; ?>
							</div>
						</div>
					<?php else : ?>
						<?php if (is_int(array_search($comment->id, array_column($commentsChild, 'comment_id')))) : ?>
							<div class="comment">
								<a href="#" class="comment-img">
									<img class="img-round" src="<?php
																if ($comment->user) {
																	echo $comment->user->getImage();
																} else {
																	echo '/no-image-available.jpg';
																}
																?>" alt="">
								</a>
								<div class="comment-body">
									<div class="comment-top">
										<h5>
											<?php if ($comment->user) {
												echo $comment->user->name;
											} else {
												echo 'Гість';
											} ?>
										</h5>
										<p class="comment-date">
											<?= $comment->getDate(); ?>
										</p>
									</div>
									<div class="comment-text">
										Видалений коментар
									</div>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>

					<?php if ($comment->user_id && $comment->user_id != Yii::$app->user->id) : ?>
						<div class="replay-comment" hidden>
							<?php $form = \yii\widgets\ActiveForm::begin([
								'action' => ['site/comment', 'id' => $article->id, 'id_comment' => $comment->id],
								'options' => ['class' => '', 'role' => 'form']
							]) ?>
							<div class="leave-comment-child"><!--leave comment-->
								<h4>Залишити відгук для
									<?php if ($comment->user) {
										echo $comment->user->name;
									} else {
										echo 'гостя';
									} ?>
								</h4>
								<div class="form-group">
									<div class="col-md-12">
										<?= $form->field($commentForm, 'comment')->textarea([
											'class' => 'form-control',
											'placeholder' => 'Write Message'
										])->label(false) ?>
									</div>
								</div>
								<button type="submit" class="btn send-btn">Опублікувати коментар</button>
								<?php \yii\widgets\ActiveForm::end() ?>
							</div><!--end leave comment-->
						</div>
					<?php endif; ?>
					<div class="comment-childs-container">
						<div class="comment-childs">
							<?php foreach ($commentsChild as $commentChild) : ?>
								<?php if ($commentChild->comment_id == $comment->id) : ?>
									<div class="comment-block">
										<div class="comment">
											<a href="#" class="comment-img">
												<img class="img-round" src="<?php if ($commentChild->user) {
																				echo $commentChild->user->getImage();
																			} else {
																				echo
																				'/no-image-available.jpg';
																			}  ?>" alt="">
											</a>
											<div class="comment-body">
												<div class="comment-top">
													<h5><?php if ($commentChild->user) {
															echo $commentChild->user->name;
														} else {
															echo 'Гість';
														} ?></h5>
													<p class="comment-date">
														<?= $commentChild->getDate(); ?>
													</p>
												</div>
												<div class="comment-text">
													<?= $commentChild->text; ?>
												</div>
												<?php if ($commentChild->user_id && $commentChild->user_id == Yii::$app->user->id) : ?>
													<?php $form = \yii\widgets\ActiveForm::begin([
														'action' => [
															'site/comment-delete', 'id' => $article->id,
															'id_comment' => $commentChild->id
														],
														'options' => ['class' => '', 'role' => 'form']
													]) ?>
													<div class="comment-delete">
														<button type="submit">
															<i class="fa fa-trash"></i>
														</button>
													</div>
													<?php \yii\widgets\ActiveForm::end() ?>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

</div>

<?php
echo \Yii::$app->view->renderFile(
	'@app/views/site/right.php',
	compact('popular', 'recent', 'topics')
);
?>

<script>
	function ShowReplay(button) {
		var comment = button.parentElement.parentElement.parentElement.parentElement;
		var repl = comment.getElementsByClassName('replay-comment')[0];
		repl.hidden = !repl.hidden;
		console.log(repl);
	}
</script>