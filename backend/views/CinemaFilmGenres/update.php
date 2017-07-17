<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmGenres */

$this->title = 'Update Cinema Film Genres: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-film-genres-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
