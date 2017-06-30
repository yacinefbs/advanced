
<?php 
use yii\helpers\Html ;

$artcl = $article['data'];

?>

<article class="artcl">
	<h2 class="w3-xxlarge w3-serif" ><?=  Html::encode($artcl['titre']) ?></h2>
	<hr>
		<span><?=  Html::encode($artcl['date_art']) ?></span>
	<hr>
	<img src=" <?= "http://localhost/yii/advanced2/backend/web/". $artcl['file'] ?> " class="w3-round" alt="Norway">
	<div class="content">
		<p>
			<?= Html::encode($artcl['contenu']) ?>
		</p>
	</div>
</article>

