<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaFilmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Films';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-films-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cinema Films', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idfilm',
            'libelle_fr',
            'libelle_ar',
            'description_fr:ntext',
            'description_ar:ntext',
            // 'path_photo',
            // 'duree',
            // 'realisateur',
            // 'acteur',
            // 'bandAnnonce',
            // 'date_sortie',
            // 'rating',
            // 'statut',
            // 'slug',
            // 'date_crea',
            // 'iduser_modif',
            // 'date_modif',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
