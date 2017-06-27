<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ArtCat */

$this->title = 'Create Art Cat';
$this->params['breadcrumbs'][] = ['label' => 'Art Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="art-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
