<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaEquipe */

$this->title = 'Update Cinema Equipe: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Equipes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-equipe-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
