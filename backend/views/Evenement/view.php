<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Evenement */

$this->title = $model->id_eve;
$this->params['breadcrumbs'][] = ['label' => 'Evenements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evenement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_eve], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_eve], [
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
            'id_eve',
            'description:ntext',
            'date_eve',
            'contenu:ntext',
            'id_user',
        ],
    ]) ?>

</div>
