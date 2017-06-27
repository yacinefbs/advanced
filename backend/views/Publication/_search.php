<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SearchPublication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publication-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pub') ?>

    <?= $form->field($model, 'titre') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'contenu') ?>

    <?= $form->field($model, 'date_pub') ?>

    <?php // echo $form->field($model, 'file') ?>

    <?php // echo $form->field($model, 'id_client') ?>

    <?php // echo $form->field($model, 'id_user') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
