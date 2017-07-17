<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaEquipeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-equipe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'nationalite') ?>

    <?= $form->field($model, 'date_naissance') ?>

    <?= $form->field($model, 'biographie') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
