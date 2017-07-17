<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CinemaFilmSalles */

$this->title = 'Create Cinema Film Salles';
$this->params['breadcrumbs'][] = ['label' => 'Cinema Film Salles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cinema-film-salles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
