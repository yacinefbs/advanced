<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmPays */

$this->title = 'Create Cinema Film Pays';
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Pays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-film-pays-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
