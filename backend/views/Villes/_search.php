<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VillesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="villes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nom_fr') ?>

    <?= $form->field($model, 'nom_ar') ?>

    <?= $form->field($model, 'slug') ?>

    <?= $form->field($model, 'publier') ?>

    <?php // echo $form->field($model, 'flag_meteo') ?>

    <?php // echo $form->field($model, 'pays_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
