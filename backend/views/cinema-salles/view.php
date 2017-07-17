<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */

$this->title = $model->idSalle;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-salles-view">
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['Modifier', 'id' => $model->idSalle], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['Supprimer', 'id' => $model->idSalle], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Êtes-vous sûr de bien vouloir supprimer cette salle ?',
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
                        'idSalle',
                        'idville',
                        'libelle_fr',
                        'libelle_ar',
                        'seance_fr',
                        'seance_ar',
                        'slug',
                        'adresse',
                        'longitude',
                        'latitude',
                        'logo',
                        'photo',
                        'publier',
                        'cree_par',
                        'date_crea',
                        'modifie_par',
                        'date_modif',
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