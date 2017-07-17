<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaEquipe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-equipe-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nationalite')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_naissance')->textInput() ?>

    <?= $form->field($model, 'biographie')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
