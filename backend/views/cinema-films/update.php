<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilms */

$this->title = 'Update Cinema Films: ' . $model->idfilm;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idfilm, 'url' => ['view', 'id' => $model->idfilm]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-films-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
