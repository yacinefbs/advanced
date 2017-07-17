<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmPays */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cinema-film-pays-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'film_id')->textInput() ?>

    <?= $form->field($model, 'pays_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
