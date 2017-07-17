<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmSalles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-film-salles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsalle')->textInput() ?>

    <?= $form->field($model, 'idfilm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
