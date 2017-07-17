<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmGenres */

$this->title = 'Create Cinema Film Genres';
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-film-genres-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
