<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Villes;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use dosamigos\multiselect\MultiSelect;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-salles-form">
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
                
                <?= $form->field($model, 'libellefr')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'libellear')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'seance_fr')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'seance_ar')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'adresse')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
                <!-- <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?> -->
                <?= $form->field($model, 'logo')->fileInput() ?>
                <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'publier')->dropDownList([ 0 => '0', 1 => '1', 9 => '9', ], ['prompt' => '']) ?>

                
                
                <?= $form->field($model,'villes')->dropDownList(
                  ArrayHelper::map(Villes::find()->all(),'id', 'nom_fr'),
                  ['prompt'=>'Sélectionner une ville ...']
                ) ?>

                <?= MultiSelect::widget([
                    'id'=>"multiXX",
                    "options" => ['multiple'=>"multiple"], // for the actual multiselect
                    'data' => ArrayHelper::map(Villes::find()->all(),'id', 'nom_fr'), // data as array
                    'value' => [ 0, 2], // if preselected
                    'name' => 'multti', // name for the form
                    "clientOptions" => 
                        [
                            "includeSelectAllOption" => true,
                            'numberDisplayed' => 2
                        ], 
                ]); ?>

                <!-- <?= $form->field($model, 'cree_par')->textInput() ?> -->
                <!-- <?= $form->field($model, 'date_crea')->textInput() ?> -->
                <!-- <?= $form->field($model, 'modifie_par')->textInput() ?> -->
                <!-- <?= $form->field($model, 'date_modif')->textInput() ?> -->
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
