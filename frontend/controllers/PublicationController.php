<?php

namespace frontend\controllers;

use frontend\models\Publication;

class PublicationController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    
}
