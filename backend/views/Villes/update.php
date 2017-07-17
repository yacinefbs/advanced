<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Villes */

$this->title = 'Update Villes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Villes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="villes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
