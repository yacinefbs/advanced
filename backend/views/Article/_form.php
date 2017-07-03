<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\User;
use dosamigos\datepicker\DatePicker;
use backend\models\Categorie;
use backend\models\CHtml;
use backend\models\Test;


use dosamigos\ckeditor\CKEditor;
// use backend\model\CHtml;

/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">
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
              
             
            <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

                <?= $form->field($model, 'titre')->textInput(['maxlength' => true]) ?>

                <!-- <?= $form->field($model, 'contenu')->textarea(['rows' => 6]) ?> -->
                <hr />
               <?php
                echo $form->field($model, 'contenu')->widget(CKEditor::className(), [
                  'options' => ['rows' => 6],
                  'preset' => 'basic'
              ]); ?>

               

                <hr />
                              
                 <?= $form->field($model, 'publie')->dropDownList(
                     ['1'=>'Oui', '0' => 'Non', '9' => 'Supprimé']
                 ); 
                 // ['prompt' => 'Publier ?']
                 ?>

                <?= $form->field($model, 'file')->fileInput() ?>

                <?php  
                    $modelCats = ArrayHelper::map($modelCats, 'categorie', 'categorie');    
                ?>

                <?php if(empty($_GET['id'])) { ?>
                    <?= $form->field($model, 'categories')->checkboxlist($modelCats);

                     ?>
                    
                <?php 
                }else{ 

                    $i=0;
                    foreach ($modelCats as $key => $value) {
                        $categorie = Categorie::find()
                          ->where(['categorie' => $value])
                          ->one(); 
                        // var_dump($categorie);
                        // exit;
                        echo $form->field($model, 'categories['.$i.']')
                                  ->checkbox([
                                    'label'=>$categorie->categorie,
                                    'value'=>$categorie->id_cat,
                                    'checked'=>1
                                  ]);
                                  $i=$i+1;
                    }      
                }


                ?>
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


