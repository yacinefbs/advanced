<div class="listArticle">
<?php 
foreach ($articles['data'] as $article) {


 ?>
	<div class="items">
		
		<div class="item-topic w3-row">
			<a href="#" class="w3-col m3 l3">
				<img width="237" height="146" alt="" src=" <?= "http://localhost/yii/advanced2/backend/web/". $article['file'] ?> " class="img-thumbnail">
			</a>
			<div class="item-info w3-col m9 l9 w3-bordred">
				<!-- <h4>
					<a href="http://lematin.ma/journal/2017/un-refrigerateur-a-lorigine-de-lincendie-de-la-tour-grenfell/274071.html">Royaume-Uni</a>
				</h4 >-->
				<h3>
					<a href="#">
						<?= $article['titre'] ?>
							
					</a>
				</h3>
				<div class="text-danger sub-info-bordered">
					<div class="time">
						<span class="ion-ios-clock-outline"></span> <?= $article['date_art'] ?> 
					</div>
				 
				</div>
				<p><?= $article['contenu'] ?></p>
			</div>
				
		</div>
	</div>

<?php 

}//end foreach ?>
<div class="w3-bar">
  <a href="#" class="w3-button">1</a>
  <a href="#" class="w3-button">2</a>
  <a href="#" class="w3-button">3</a>
  <a href="#" class="w3-button">4</a>
  <a href="#" class="w3-button">5</a>
</div>
</div>

