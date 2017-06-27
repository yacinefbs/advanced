<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArtCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="art-cat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_art')->textInput() ?>

    <?= $form->field($model, 'id_cat')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
