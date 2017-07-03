<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SearchPublication */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publication-index">
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

        <p>
            <?= Html::a('Create Publication', ['create'], ['class' => 'btn btn-success']) ?>
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
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        // ['class' => 'yii\grid\SerialColumn'],

                        'id_pub',
                        [
                         'attribute'=>'id_client',
                         'value'=>'client.nom',
                         'label'=>"Client"
                         ],
                        'titre',
                        // 'description:ntext',
                        // 'contenu:ntext',
                        'date_pub',
                        // 'file:ntext',

                        // 'id_user',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
              </div>
        </div>
    </div>
</div>
</section>
</div>
</div>