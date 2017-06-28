<?php
/* @var $this yii\web\View */

//$articless =$articles;
$arts=$articles ;
$cnt=0;

foreach ($articles['data'] as $article) {
	# code...
//var_dump($article)
	$cnt++;
	if ($cnt==4) break;
?>
<div class="w3-card-4 w3-margin w3-white" style="border: 1px solide #000">
    <img src=<?= "http://localhost/yii/advanced2/backend/web/". $article['file'] ?> alt="Nature" style="width:100%">
    <div class="w3-container">
      <h3><b><?= $article['titre'] ?></b></h3>
      <h5>Title description, <span class="w3-opacity"><?= $article['date_art'] ?></span></h5>
    </div>

    <div class="w3-container">
      <p><?= $article['contenu'] ?></p>
      <!-- <div class="w3-row">
        <div class="w3-col m8 s12">
          <p><button class="w3-button w3-padding-large w3-white w3-border"><b>READ MORE »</b></button></p>
        </div>
        <div class="w3-col m4 w3-hide-small">
          <p><span class="w3-padding-large w3-right"><b>Comments  </b> <span class="w3-tag">0</span></span></p>
        </div>
      </div> -->
    </div>
  </div>
  <?php 
  }
?>