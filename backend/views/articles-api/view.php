<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ArticlesApi */

$this->title = $model->idContent;
$this->params['breadcrumbs'][] = ['label' => 'Articles Apis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-api-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idContent], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idContent], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idContent',
            'idOut',
            'article_year',
            'idParent',
            'idRubrique',
            'origine_id',
            'ordre',
            'ordreRub',
            'surTitre',
            'titre:ntext',
            'sousTitre:ntext',
            'resume:ntext',
            'contenu:ntext',
            'seo_titre:ntext',
            'seo_desc:ntext',
            'seo_mcles:ntext',
            'texteBloc:ntext',
            'image',
            'imgcaption',
            'auteur_id',
            'source_id',
            'exclusif',
            'is_comment',
            'is_slider',
            'statut',
            'slug:ntext',
            'is_galerie',
            'is_video',
            'is_audio',
            'is_social',
            'id_video',
            'date_crea',
            'date_modif',
            'creepar_id',
            'modifpar_id',
            'count_views',
            'count_comment',
            'count_fblike',
            'count_fbshare',
        ],
    ]) ?>

</div>
