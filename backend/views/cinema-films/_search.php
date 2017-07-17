<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-films-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfilm') ?>

    <?= $form->field($model, 'libelle_fr') ?>

    <?= $form->field($model, 'libelle_ar') ?>

    <?= $form->field($model, 'description_fr') ?>

    <?= $form->field($model, 'description_ar') ?>

    <?php // echo $form->field($model, 'path_photo') ?>

    <?php // echo $form->field($model, 'duree') ?>

    <?php // echo $form->field($model, 'realisateur') ?>

    <?php // echo $form->field($model, 'acteur') ?>

    <?php // echo $form->field($model, 'bandAnnonce') ?>

    <?php // echo $form->field($model, 'date_sortie') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'statut') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'date_crea') ?>

    <?php // echo $form->field($model, 'iduser_modif') ?>

    <?php // echo $form->field($model, 'date_modif') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
