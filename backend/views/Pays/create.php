<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pays */

$this->title = 'Create Pays';
$this->params['breadcrumbs'][] = ['label' => 'Pays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pays-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
