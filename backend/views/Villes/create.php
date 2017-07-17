<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Villes */

$this->title = 'Ajouter une ville';
$this->params['breadcrumbs'][] = ['label' => 'Villes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="villes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
