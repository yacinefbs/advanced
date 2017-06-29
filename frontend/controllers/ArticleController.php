<?php

namespace frontend\controllers;
use frontend\models\Article;


use yii\helpers\Url;
use yii\helpers\Json;
class ArticleController extends \yii\web\Controller
{
	public $layout='main1';
	public $enableCsrfValidation = false;

    public function actionIndex($key)
    {
    	$post = file_get_contents("http://localhost".Url::to(['article/list-article']));
    	$articles = json_decode($post, true);

	    	if(!empty($articles['data'])){
	    			return $this->render('index',[
		            'articles' => $articles,
		        ]);

	    	}else{

	    		return $this->render('index-0',[]);
	    	}
    }
}
