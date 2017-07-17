<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */

$this->title = $model->idSalle;
$this->params['breadcrumbs'][] = ['label' => 'Cinema Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-salles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSalle], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSalle], [
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
            'idSalle',
            'idville',
            'libelle_fr',
            'libelle_ar',
            'seance_fr',
            'seance_ar',
            'slug',
            'adresse',
            'longitude',
            'latitude',
            'logo',
            'photo',
            'publier',
            'cree_par',
            'date_crea',
            'modifie_par',
            'date_modif',
        ],
    ]) ?>

</div>
