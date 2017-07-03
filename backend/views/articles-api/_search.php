<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-api-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idContent') ?>

    <?= $form->field($model, 'idOut') ?>

    <?= $form->field($model, 'article_year') ?>

    <?= $form->field($model, 'idParent') ?>

    <?= $form->field($model, 'idRubrique') ?>

    <?php // echo $form->field($model, 'origine_id') ?>

    <?php // echo $form->field($model, 'ordre') ?>

    <?php // echo $form->field($model, 'ordreRub') ?>

    <?php // echo $form->field($model, 'surTitre') ?>

    <?php // echo $form->field($model, 'titre') ?>

    <?php // echo $form->field($model, 'sousTitre') ?>

    <?php // echo $form->field($model, 'resume') ?>

    <?php // echo $form->field($model, 'contenu') ?>

    <?php // echo $form->field($model, 'seo_titre') ?>

    <?php // echo $form->field($model, 'seo_desc') ?>

    <?php // echo $form->field($model, 'seo_mcles') ?>

    <?php // echo $form->field($model, 'texteBloc') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'imgcaption') ?>

    <?php // echo $form->field($model, 'auteur_id') ?>

    <?php // echo $form->field($model, 'source_id') ?>

    <?php // echo $form->field($model, 'exclusif') ?>

    <?php // echo $form->field($model, 'is_comment') ?>

    <?php // echo $form->field($model, 'is_slider') ?>

    <?php // echo $form->field($model, 'statut') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'is_galerie') ?>

    <?php // echo $form->field($model, 'is_video') ?>

    <?php // echo $form->field($model, 'is_audio') ?>

    <?php // echo $form->field($model, 'is_social') ?>

    <?php // echo $form->field($model, 'id_video') ?>

    <?php // echo $form->field($model, 'date_crea') ?>

    <?php // echo $form->field($model, 'date_modif') ?>

    <?php // echo $form->field($model, 'creepar_id') ?>

    <?php // echo $form->field($model, 'modifpar_id') ?>

    <?php // echo $form->field($model, 'count_views') ?>

    <?php // echo $form->field($model, 'count_comment') ?>

    <?php // echo $form->field($model, 'count_fblike') ?>

    <?php // echo $form->field($model, 'count_fbshare') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
