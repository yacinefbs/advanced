<?php

namespace frontend\controllers;

use frontend\models\Categorie;

class CategorieController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    

}
