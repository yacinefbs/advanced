<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Villes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Villes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="villes-view">
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Êtes-vous sûr de vouloir supprimer cette ville ?',
                    'method' => 'post',
                ],
            ]) ?>
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
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nom_fr',
                'nom_ar',
                'slug',
                'publier',
                'flag_meteo',
                'pays.nom_fr',
            ],
        ]) ?>
            </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        </section>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

   
    </div> 
