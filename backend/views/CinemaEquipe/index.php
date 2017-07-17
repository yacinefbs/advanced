<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaEquipeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Equipes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-equipe-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cinema Equipe', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'nom',
            'nationalite',
            'date_naissance',
            'biographie:ntext',
            // 'photo',
            // 'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
