<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Evenement */

$this->title = 'Ajouter un événement';
$this->params['breadcrumbs'][] = ['label' => 'Evenements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evenement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
