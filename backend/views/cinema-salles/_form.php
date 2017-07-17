<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-salles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idville')->textInput() ?>

    <?= $form->field($model, 'libelle_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'libelle_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seance_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seance_ar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adresse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'publier')->dropDownList([ 0 => '0', 1 => '1', 9 => '9', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cree_par')->textInput() ?>

    <?= $form->field($model, 'date_crea')->textInput() ?>

    <?= $form->field($model, 'modifie_par')->textInput() ?>

    <?= $form->field($model, 'date_modif')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
