<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Categorie;
use dosamigos\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-api-form">
    <div class="box-header with-border">
    <section class="content">    
<!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                    <!-- <?= $form->field($model, 'idOut')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'article_year')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'idParent')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'idRubrique')->textInput() ?> -->
                    <?= $form->field($model, 'idRubrique')->dropDownList(
                        ArrayHelper::map(Categorie::find()->all(), 'id_cat', 'categorie'),
                        ['prompt' => 'Sélectionner une rubrique']
                    ); ?>
                   

                    <!-- <?= $form->field($model, 'origine_id')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'ordre')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'ordreRub')->textInput() ?> -->

                    <?= $form->field($model, 'surTitre')->textInput(['maxlength' => true]) ?>

                    <!-- <?= $form->field($model, 'titre')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'titre')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>

                    <!-- <?= $form->field($model, 'sousTitre')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'sousTitre')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>

                    <!-- <?= $form->field($model, 'resume')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'resume')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>


                    <!-- <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'contenu')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>

                    <!-- <?= $form->field($model, 'seo_titre')->textarea(['rows' => 6]) ?> -->

                    <!-- <?= $form->field($model, 'seo_desc')->textarea(['rows' => 6]) ?> -->

                    <!-- <?= $form->field($model, 'seo_mcles')->textarea(['rows' => 6]) ?> -->

                    <!-- <?= $form->field($model, 'texteBloc')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'texteBloc')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>
                    <!-- <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?> -->
                    <?= $form->field($model, 'image')->fileInput() ?>

                    <!-- <?= $form->field($model, 'imgcaption')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'auteur_id')->textInput(['maxlength' => true]) ?> -->

                    <?= $form->field($model, 'source_id')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'exclusif')->textInput() ?>

                    <?= $form->field($model, 'is_comment')->dropDownList([ '0', '1'], ['prompt' => '']) ?>

                    <?= $form->field($model, 'is_slider')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'statut')->dropDownList([ 1 => '1', 0 => '0', 9 => '9', ], ['prompt' => '']) ?>

                    <!-- <?= $form->field($model, 'slug')->textarea(['rows' => 6]) ?> -->
                    <?php
                        echo $form->field($model, 'slug')->widget(CKEditor::className(), [
                          'options' => ['rows' => 6],
                          'preset' => 'basic'
                      ]); ?>

                    <?= $form->field($model, 'is_galerie')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'is_video')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'is_audio')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'is_social')->dropDownList([ '0', '1', ], ['prompt' => '']) ?>

                    <!-- <?= $form->field($model, 'id_video')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'date_crea')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'date_modif')->textInput() ?> -->

                    <!-- <?= $form->field($model, 'creepar_id')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'modifpar_id')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'count_views')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'count_comment')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'count_fblike')->textInput(['maxlength' => true]) ?> -->

                    <!-- <?= $form->field($model, 'count_fbshare')->textInput(['maxlength' => true]) ?> -->

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        </section>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

   
    </div> 
</div>
