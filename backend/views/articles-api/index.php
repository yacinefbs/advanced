<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticlesApiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles Apis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <div class="box-header with-border">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <p>
        <?= Html::a('Create Articles Api', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>

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
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        // ['class' => 'yii\grid\SerialColumn'],

                        'idContent',
                        // 'idOut',
                        'article_year',
                        // 'idParent',
                        'idRubrique',
                        // 'origine_id',
                        // 'ordre',
                        // 'ordreRub',
                        // 'surTitre',
                        // 'titre:ntext',
                        // 'sousTitre:ntext',
                        // 'resume:ntext',
                        // 'contenu:ntext',
                        // 'seo_titre:ntext',
                        // 'seo_desc:ntext',
                        // 'seo_mcles:ntext',
                        // 'texteBloc:ntext',
                        // 'image',
                        // 'imgcaption',
                        // 'auteur_id',
                        // 'source_id',
                        // 'exclusif',
                        // 'is_comment',
                        // 'is_slider',
                        'statut',
                        // 'slug:ntext',
                        // 'is_galerie',
                        // 'is_video',
                        // 'is_audio',
                        // 'is_social',
                        // 'id_video',
                        // 'date_crea',
                        // 'date_modif',
                        // 'creepar_id',
                        // 'modifpar_id',
                        // 'count_views',
                        // 'count_comment',
                        // 'count_fblike',
                        // 'count_fbshare',

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
                </div>
        </div>
    </div>
</div>
</section>
</div>
</div>
