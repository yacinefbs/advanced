<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArtCatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Art Cats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-cat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Art Cat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_art',
            'id_cat',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
