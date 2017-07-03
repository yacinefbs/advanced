
  <!-- Slideshow -->
  <div class="w3-content w3-display-container slideshow w3-margin-top w3-margin-bottom bordred">
<?php 
use yii\helpers\Url;
use yii\helpers\Html;
$i=0;
foreach ($articles['data'] as $article) {
  ?>
        <div class="w3-display-container mySlides w3-animate-opacity" style="display: none;">
          <a href="<?= Url::to(['article/view','key'=>'ef32927ac29584c2a3250028c2c456d7','id'=>$article['id_art']]); ?>">
            <img src="<?=  Html::encode($article['file'] )?>" style="width:100%">
          </a>
          <div class="divslidecaption">
            <span class=" w3-padding-large"><a href="<?= Url::to(['article/view','key'=>'ef32927ac29584c2a3250028c2c456d7','id'=>$article['id_art']]); ?>"><?= Html::encode($article['titre']) ?></a></span>
          </div>
        </div>
<?php 
$i++;
if($i==3)break;
}//end for each
 ?>
      <button class="w3-button w3-light-grey noselection w3-display-left" onclick="plusDivs(-1)"><b><</b></button>
      <button class="w3-button w3-light-grey noselection w3-display-right" onclick="plusDivs(+1)"><b>></b></button>

</div>
<script>

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1} 
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    x[slideIndex-1].style.display = "block"; 
}

</script>