<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmEquipe */

$this->title = 'Update Cinema Film Equipe: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Equipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'ID' => $model->ID, 'film_id' => $model->film_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-film-equipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
