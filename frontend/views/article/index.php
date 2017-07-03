<?php 

use yii\helpers\Url;
use yii\helpers\Html ;

 ?>

<div class="listArticle">
<?php 
foreach ($articles['data'] as $article) {


 ?>
	<div class="items">
		
		<div class="item-topic w3-row">
			<a href="<?= Url::to(['article/view','key'=>'ef32927ac29584c2a3250028c2c456d7','id'=>$article['id_art']]); ?>" class="w3-col m3 l3">
				<img  alt="" src=" <?=  Html::encode($article['file'] )?> " class="img-thumbnail">
			</a>
			<div class="item-info w3-col m9 l9 w3-bordred">
				<!-- <h4>
					<a href="http://lematin.ma/journal/2017/un-refrigerateur-a-lorigine-de-lincendie-de-la-tour-grenfell/274071.html">Royaume-Uni</a>
				</h4 >-->
				<h3>
					<a href="<?= Url::to(['article/view','key'=>'ef32927ac29584c2a3250028c2c456d7','id'=>$article['id_art']]); ?>">
						<?= Html::encode($article['titre']) ?>
							
					</a>
				</h3>
				<div class="text-danger sub-info-bordered">
					<div class="time">
						<span class="ion-ios-clock-outline"></span> <?= Html::encode($article['date_art']) ?> 
					</div>
				 
				</div>
				<p><?php 
					$contenu=Html::encode($article['contenu']);
				if(strlen($contenu)>151){ echo substr($contenu,0,150).' ....'; }else{ echo $contenu; }?></p>
				<button class="w3-btn w3-white w3-border w3-right"><a href="<?= Url::to(['article/view','key'=>'ef32927ac29584c2a3250028c2c456d7','id'=>$article['id_art']]); ?>">Lire la suite</a></button>
			</div>
				
		</div>
	</div>

<?php 

}//end foreach 
$info = $articles['info'];

$perPage = $info['perPage'];
$totalCount = $info['totalCount'];
$currentPage  = $info['currentPage'];

if($totalCount>$perPage){

echo '<div class="w3-bar w3-center">';

	$pages=ceil($totalCount/$perPage) ;

	//first && previous button
	if($currentPage>1){
	?>
		<a href="<?= $url.'&page=1' ; ?>" class="w3-button"><<</a>
		<a href="<?= $url.'&page='.($currentPage-1) ; ?>" class="w3-button"><</a>
	<?php
	}
	//end first && previous button
	$entryif=true ;
	for ($i=0; $i < $pages ; $i++) { 
		if($pages<10 or ($i>=$currentPage-4 && $i<=$currentPage+2)){

		
		?>
			<a href="<?= $url.'&page='.($i+1) ; ?>" class="w3-button"><?php echo $i+1;  ?></a>

		<?php
		}
		if($pages>10 && $pages>$currentPage+3 && $i>$currentPage+3 && $entryif){
			$entryif = false;
			?>
			<a class="w3-button"> ..... </a>
			<a href="<?= $url.'&page='.$pages ; ?>" class="w3-button"><?= $pages ?></a>
		<?php
		}

	}
		//last && next button
	if($currentPage<$pages){
	?>
		<a href="<?= $url.'&page='.($currentPage+1) ; ?>" class="w3-button">></a>
		<a href="<?= $url.'&page='.$pages ; ?>" class="w3-button">>></a>
	<?php
	}
	//end first && previous button
	echo "</div>";
}

?>
  

</div>

