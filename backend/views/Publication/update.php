<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Publication */

$this->title = 'Modifier publication: ' . $model->id_pub;
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pub, 'url' => ['view', 'id' => $model->id_pub]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publication-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
