<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */

$this->title = 'Update Cinema Salles: ' . $model->idSalle;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSalle, 'url' => ['view', 'id' => $model->idSalle]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cinema-salles-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
