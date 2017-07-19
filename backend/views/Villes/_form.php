<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Pays;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Villes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="villes-form">
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
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nom_fr')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'nom_ar')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

            <!-- <?= $form->field($model, 'publier')->textInput() ?> -->

            <?= $form->field($model, 'flag_meteo')->textInput() ?>

            <!-- <?= $form->field($model, 'pays_id')->textInput() ?> -->
            <?= $form->field($model,'pays_id')->dropDownList(
            ArrayHelper::map(Pays::find()->all(),'id','nom_fr'),
            ['prompt'=>'Selectionner un pays']
            ) ?>

            <!-- <?php 
            // french
            /*
            echo Select2::widget([
                'name' => 'pays_id',
                'language' => 'fr',
                'data' => $data,
                'options' => ['placeholder' => 'Sélectionnez un état ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); */
            ?> -->

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

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
