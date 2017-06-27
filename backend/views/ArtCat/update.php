<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtCat */

$this->title = 'Update Art Cat: ' . $model->id_art;
$this->params['breadcrumbs'][] = ['label' => 'Art Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_art, 'url' => ['view', 'id_art' => $model->id_art, 'id_cat' => $model->id_cat]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="art-cat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
