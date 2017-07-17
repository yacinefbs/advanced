<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaGenres */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-genres-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'genre_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genre_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
