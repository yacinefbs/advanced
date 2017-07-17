<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmSalles */

$this->title = 'Update Cinema Film Salles: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-film-salles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
