<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-api-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idOut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article_year')->textInput() ?>

    <?= $form->field($model, 'idParent')->textInput() ?>

    <?= $form->field($model, 'idRubrique')->textInput() ?>

    <?= $form->field($model, 'origine_id')->textInput() ?>

    <?= $form->field($model, 'ordre')->textInput() ?>

    <?= $form->field($model, 'ordreRub')->textInput() ?>

    <?= $form->field($model, 'surTitre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'titre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sousTitre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'resume')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_titre')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_mcles')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'texteBloc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imgcaption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auteur_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'source_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exclusif')->textInput() ?>

    <?= $form->field($model, 'is_comment')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_slider')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'statut')->dropDownList([ 1 => '1', 0 => '0', 9 => '9', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'slug')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_galerie')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_video')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_audio')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'is_social')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_video')->textInput() ?>

    <?= $form->field($model, 'date_crea')->textInput() ?>

    <?= $form->field($model, 'date_modif')->textInput() ?>

    <?= $form->field($model, 'creepar_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modifpar_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_views')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_fblike')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count_fbshare')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
