<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtCat */

$this->title = $model->id_art;
$this->params['breadcrumbs'][] = ['label' => 'Art Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-cat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_art' => $model->id_art, 'id_cat' => $model->id_cat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_art' => $model->id_art, 'id_cat' => $model->id_cat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_art',
            'id_cat',
        ],
    ]) ?>

</div>
