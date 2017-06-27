<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Evenement */

$this->title = 'Modifier événement: ' . $model->id_eve;
$this->params['breadcrumbs'][] = ['label' => 'Evenements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_eve, 'url' => ['view', 'id' => $model->id_eve]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evenement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
