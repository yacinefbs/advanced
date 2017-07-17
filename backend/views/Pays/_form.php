<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pays-form">

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
                <?= $form->field($model, 'publier')->dropDownList(
                     ['1'=>'Oui', '0' => 'Non', '9' => 'Supprimé']
                 ); 
                 // ['prompt' => 'Publier ?']
                 ?>

                <?= $form->field($model, 'flag')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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

