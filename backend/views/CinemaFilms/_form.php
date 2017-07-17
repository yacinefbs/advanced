<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-films-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libelle_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'libelle_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_ar')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'path_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realisateur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'acteur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bandAnnonce')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_sortie')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'statut')->dropDownList([ 0 => '0', 1 => '1', 9 => '9', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_crea')->textInput() ?>

    <?= $form->field($model, 'iduser_modif')->textInput() ?>

    <?= $form->field($model, 'date_modif')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
