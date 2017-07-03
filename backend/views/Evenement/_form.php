<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\Evenement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">
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

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    
    <?= $form->field($model, 'date_eve')->widget(
	    DatePicker::className(), [
	        // inline too, not bad
	         'inline' => false, 
	         // modify template for custom rendering
	        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
	        'clientOptions' => [
	            'autoclose' => true,
	            'format' => 'yyyy-m-d'
	        ]
	]);?>

    <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'id_user')->dropDownList(
        ArrayHelper::map(User::find()->all(), 'id', 'username'),
        ['prompt' => 'Sélectionner user']
    ); ?>
    -->

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
</div>
