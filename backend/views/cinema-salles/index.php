<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CinemaSallesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cinema Salles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-salles-index">
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Ajouter une salle', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="box-header with-border">
    <section class="content">    
<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'idSalle',
                        'libellefr',
                        'libellear',
                        'cinemaFilmSalles.nom_fr',
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
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
