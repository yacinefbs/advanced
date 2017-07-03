<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApi */

$this->title = 'Update Articles Api: ' . $model->idContent;
$this->params['breadcrumbs'][] = ['label' => 'Articles Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idContent, 'url' => ['view', 'id' => $model->idContent]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articles-api-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
