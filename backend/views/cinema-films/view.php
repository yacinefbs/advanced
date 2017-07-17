<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilms */

$this->title = $model->idfilm;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-films-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idfilm], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idfilm], [
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
            'idfilm',
            'libelle_fr',
            'libelle_ar',
            'description_fr:ntext',
            'description_ar:ntext',
            'path_photo',
            'duree',
            'realisateur',
            'acteur',
            'bandAnnonce',
            'date_sortie',
            'rating',
            'statut',
            'slug',
            'date_crea',
            'iduser_modif',
            'date_modif',
            'user_id',
        ],
    ]) ?>

</div>
