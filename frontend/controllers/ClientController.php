<?php

namespace frontend\controllers;

use frontend\models\CLient;

class ClientController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    

}
