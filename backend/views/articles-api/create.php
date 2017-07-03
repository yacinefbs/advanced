<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApi */

$this->title = 'Ajouter Article';
$this->params['breadcrumbs'][] = ['label' => 'Articles Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-api-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
