<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Client;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model backend\models\Publication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categorie-index">

    <p>
        <?= Html::a('Ajouter Publication', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

            <!-- <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?> -->
            <?php
                echo $form->field($model, 'description')->widget(CKEditor::className(), [
                  'options' => ['rows' => 6],
                  'preset' => 'basic'
              ]); ?>

            <!-- <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?> -->
            <?php
                echo $form->field($model, 'contenu')->widget(CKEditor::className(), [
                  'options' => ['rows' => 6],
                  'preset' => 'basic'
              ]); ?>

            <?=  $form->field($model, 'date_pub')->widget(DatePicker::className(),[

            'name' => 'check_issue_date', 
            
            'options' => ['placeholder' => 'Select issue date ...'],
            'pluginOptions' => [
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => true
            ]
          ]);?>
    <?= $form->field($model, 'file')->fileInput() ?>

<!--     <?= $form->field($model, 'id_client')->textInput() ?>
     -->    <?=
         $form->field($model, 'id_client')->DropDownList(
            ArrayHelper::map(Client::find()->all(),'id_clt','nom'),
            ['promot'=>'select Client']
            )->label('Client ');
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

