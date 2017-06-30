<?php 

use yii\helpers\Url;

?>


<div class="w3-bar w3-border w3-light-grey">
  <a href="<?= Url::to(['site/home']) ?>" class="w3-bar-item w3-button">Home</a>
  <a href="<?= Url::to(['article/index','key'=>'ef32927ac29584c2a3250028c2c456d7','page'=>1]); ?>" class="w3-bar-item w3-button">Link 1</a>
  <div class="w3-dropdown-hover">
    <a href="<?= Url::to(['article/index','key'=>'ef32927ac29584c2a3250028c2c456d7','page'=>1]); ?>" class="w3-button">Article <i class="fa fa-caret-down"></i></a>
    <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
  </div>
</div>
    