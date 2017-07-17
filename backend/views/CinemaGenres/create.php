<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CinemaGenres */

$this->title = 'Create Cinema Genres';
$this->params['breadcrumbs'][] = ['label' => 'Cinema Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-genres-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
