<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EvenementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evenements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evenement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Evenement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<div class="row" style="width: 95%;">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_eve',
            'description:ntext',
            'date_eve',
            'contenu:ntext',
            'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
</div>
