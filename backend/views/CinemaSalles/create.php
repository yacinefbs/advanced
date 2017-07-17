<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CinemaSalles */

$this->title = 'Create Cinema Salles';
$this->params['breadcrumbs'][] = ['label' => 'Cinema Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-salles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
