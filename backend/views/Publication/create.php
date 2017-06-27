<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Publication */

$this->title = 'Ajouter une publication';
$this->params['breadcrumbs'][] = ['label' => 'Publications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publication-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
