<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaFilmSallesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Film Salles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-film-salles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cinema Film Salles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idsalle',
            'idfilm',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
