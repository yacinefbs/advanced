<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSallesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-salles-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSalle') ?>

    <?= $form->field($model, 'idville') ?>

    <?= $form->field($model, 'libelle_fr') ?>

    <?= $form->field($model, 'libelle_ar') ?>

    <?= $form->field($model, 'seance_fr') ?>

    <?php // echo $form->field($model, 'seance_ar') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'adresse') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'publier') ?>

    <?php // echo $form->field($model, 'cree_par') ?>

    <?php // echo $form->field($model, 'date_crea') ?>

    <?php // echo $form->field($model, 'modifie_par') ?>

    <?php // echo $form->field($model, 'date_modif') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
