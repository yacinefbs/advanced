<?php

namespace backend\modules\api\controllers;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
