<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pays-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nom_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publier')->textInput() ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
