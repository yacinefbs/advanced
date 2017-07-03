<?php 

use yii\helpers\Url;

?>


<div class="w3-bar w3-border w3-light-grey">
  <a href="<?= Url::to(['site/home']) ?>" class="w3-bar-item w3-button">Home</a>
   
  <a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'nation']) ?>" class="w3-bar-item w3-button w3-hide-small">Nation</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Monde']) ?>" class="w3-bar-item w3-button w3-hide-small">Monde</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Economie']) ?>" class="w3-bar-item w3-button w3-hide-small">Economie</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Sport']) ?>" class="w3-bar-item w3-button w3-hide-small">Sport</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Automobile']) ?>" class="w3-bar-item w3-button w3-hide-small">Automobile</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Société']) ?>" class="w3-bar-item w3-button w3-hide-small">Société</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Culture']) ?>" class="w3-bar-item w3-button w3-hide-small">Culture</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Emploi']) ?>" class="w3-bar-item w3-button w3-hide-small">Emploi</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Région']) ?>" class="w3-bar-item w3-button w3-hide-small">Région</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'GeoPolis']) ?>" class="w3-bar-item w3-button w3-hide-small">GeoPolis</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Spécial']) ?>" class="w3-bar-item w3-button w3-hide-small">Spécial</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Activités royales']) ?>" class="w3-bar-item w3-button w3-hide-small">Activités royales</a>

 <div class="w3-dropdown-hover w3-hide-small">
    <a href="<?= Url::to(['article/index','key'=>'ef32927ac29584c2a3250028c2c456d7','page'=>1]); ?>" class="w3-button">Article <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button ">Link 1</a>
      <a href="#" class="w3-bar-item w3-button ">Link 2</a>
      <a href="#" class="w3-bar-item w3-button ">Link 3</a>
    </div>
  </div>

  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" id="togelebutton">&#9776;</a>

</div>
    

<!-- nav for mobile -->

<div id="nav-mob" class="w3-bar-block w3-border w3-light-grey w3-hide w3-hide-large w3-hide-medium">

  <a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'nation']) ?>" class="w3-bar-item w3-button ">Nation</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Monde']) ?>" class="w3-bar-item w3-button ">Monde</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Economie']) ?>" class="w3-bar-item w3-button ">Economie</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Sport']) ?>" class="w3-bar-item w3-button ">Sport</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Automobile']) ?>" class="w3-bar-item w3-button ">Automobile</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Société']) ?>" class="w3-bar-item w3-button ">Société</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Culture']) ?>" class="w3-bar-item w3-button ">Culture</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Emploi']) ?>" class="w3-bar-item w3-button ">Emploi</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Région']) ?>" class="w3-bar-item w3-button ">Région</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'GeoPolis']) ?>" class="w3-bar-item w3-button ">GeoPolis</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Spécial']) ?>" class="w3-bar-item w3-button ">Spécial</a>
<a href="<?= Url::to(['article/articles-by-categorie','key'=>'ef32927ac29584c2a3250028c2c456d7','cat'=>'Activités royales']) ?>" class="w3-bar-item w3-button ">Activités royales</a>

 <div class="w3-dropdown-hover">
    <a href="<?= Url::to(['article/index','key'=>'ef32927ac29584c2a3250028c2c456d7','page'=>1]); ?>" class="w3-button">Article <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button ">Link 1</a>
      <a href="#" class="w3-bar-item w3-button ">Link 2</a>
      <a href="#" class="w3-bar-item w3-button ">Link 3</a>
    </div>
  </div>

</div>

<?php 

$script = <<< JS

$('#togelebutton').click(function() {
    var x = $("#nav-mob");
    if (x.hasClass("w3-show")) {
        x.removeClass(" w3-show") ;
    } else { 
        x.addClass(" w3-show") ;
    }
});
JS;
$this->registerJs($script)

 ?>