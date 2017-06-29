<?php

namespace frontend\controllers;
use frontend\models\Article;


use yii\helpers\Url;
use yii\helpers\Json;
class ArticleController extends \yii\web\Controller
{
public $layout='main1';
	public $enableCsrfValidation = false;

    public function actionIndex($page=1,$key)
    {
    	$post = file_get_contents("http://localhost/yii/advanced2/backend/web/index.php?r=article/list-article&key=".$key."&page=".$page);
    	$articles = json_decode($post, true);

    	// var_dump($articles);
    	// exit;

    	// if($token==md5('yacine')){
    		//var_dump($articles);
	    	if($articles['status']==true){

	    			return $this->render('index',[
		            'articles' => $articles,
		        ]);

	    	}else{

	    		return $this->render('index-0',[]);
	    		
	    	}
	        
    	//}
    	// else{
    	// 	var_dump(array(['Token'=>'Incorrecte']));
    	// 	exit;
    	// }

    }
}
