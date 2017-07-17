<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaSallesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Salles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-salles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cinema Salles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSalle',
            'idville',
            'libelle_fr',
            'libelle_ar',
            'seance_fr',
            // 'seance_ar',
            // 'slug',
            // 'adresse',
            // 'longitude',
            // 'latitude',
            // 'logo',
            // 'photo',
            // 'publier',
            // 'cree_par',
            // 'date_crea',
            // 'modifie_par',
            // 'date_modif',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
