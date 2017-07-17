<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Pays;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\CinemaEquipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-equipe-form">
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

            <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

            <!-- <?= $form->field($model, 'nationalite')->textInput(['maxlength' => true]) ?> -->
            <?= $form->field($model,'nationalite')->dropDownList(
            ArrayHelper::map(Pays::find()->all(),'id', 'nom_fr'),
            ['prompt'=>'Select Company']
            ) ?>

            <!-- <?= $form->field($model, 'date_naissance')->textInput() ?> -->
            <?=  $form->field($model, 'date_naissance')->widget(DatePicker::className(),[
            'name' => 'check_issue_date', 
            'options' => ['placeholder' => 'Sélectionner une date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
          ]);?>

            <!-- <?= $form->field($model, 'biographie')->textarea(['rows' => 6]) ?> -->
             <?php
                echo $form->field($model, 'biographie')->widget(CKEditor::className(), [
                  'options' => ['rows' => 6],
                  'preset' => 'basic'
              ]); ?>

            <!-- <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?> -->
            <?= $form->field($model, 'photo')->fileInput() ?>

            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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
