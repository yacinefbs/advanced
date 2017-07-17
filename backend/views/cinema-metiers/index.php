<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaMetiersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Metiers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-metiers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cinema Metiers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'metier_ar',
            'metier_fr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
