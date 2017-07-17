<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Pays;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use backend\models\CinemaMetiers;
/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-films-form">
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
                <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

                <?= $form->field($model, 'libelle_fr')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'libelle_ar')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description_fr')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'description_ar')->textarea(['rows' => 6]) ?>

                <!-- <?= $form->field($model, 'path_photo')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'path_photo')->fileInput() ?>

                <?= $form->field($model, 'duree')->textInput(['maxlength' => true]) ?>

                <!-- <?= $form->field($model, 'realisateur')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model,'real')->dropDownList(
                ArrayHelper::map(CinemaMetiers::find()->all(),'ID', 'metier_fr'),
                    ['prompt'=>'Sélectionner un réalisateur ...']
                ) ?>

                <!-- <?= $form->field($model, 'acteur')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model,'act')->dropDownList(
                    ArrayHelper::map(Pays::find()->all(),'id', 'nom_fr'),
                    ['prompt'=>'Sélectionner un acteur ...']
                    ) ?>

                <!-- <?= $form->field($model, 'bandAnnonce')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'bandAnnonce')->fileInput() ?>

                <!-- <?= $form->field($model, 'date_sortie')->textInput() ?> -->
                <?=  $form->field($model, 'date_sortie')->widget(DatePicker::className(),[
                    'name' => 'check_issue_date', 
                    'options' => ['placeholder' => 'Sélectionner une date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                  ]);?>

                <?= $form->field($model, 'rating')->textInput() ?>

                <?= $form->field($model, 'statut')->dropDownList([ 0 => '0', 1 => '1', 9 => '9', ], ['prompt' => '']) ?>

                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

                <!-- <?= $form->field($model, 'date_crea')->textInput() ?> -->

                <!-- <?= $form->field($model, 'iduser_modif')->textInput() ?> -->

                <!-- <?= $form->field($model, 'date_modif')->textInput() ?> -->

                <!-- <?= $form->field($model, 'user_id')->textInput() ?> -->

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>
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