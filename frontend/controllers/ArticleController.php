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
    	$post = file_get_contents(str_replace(' ', '+', "http://localhost/yii/advanced2/backend/web/index.php?r=article/list-article&key=".$key."&page=".$page));
    	$articles = json_decode($post, true);

    	$url = Url::to(['article/index','key'=>$key]) ;

	    	if($articles['status']==true){
	    			return $this->render('index',[
		            'articles' => $articles,
		            'url' =>$url
		        ]);

	    	}else{
	    		return $this->render('index-0',['articles' => $articles]);
	    	}
    }


    public function actionView($key,$id){

    	$post = file_get_contents(str_replace(' ', '+', "http://localhost/yii/advanced2/backend/web/index.php?r=article/list-article-by-id&key=".$key."&id=".$id));
    	$article= json_decode($post, true);


	    	if($article['status']==true){
	    			return $this->render('view',[
		            'article' => $article,
		        ]);

	    	}else{
	    		return $this->render('view-0',['article' => $article,]);
	    	}

    }

    public function actionArticlesByCategorie($page=1,$key,$cat)
    {
    	
    	$post = file_get_contents(str_replace(' ','+',"http://localhost/yii/advanced2/backend/web/index.php?r=article/list-article-by-categorie&key=".$key."&cat=".$cat."&page=".$page.""));
    	$articles = json_decode($post, true);

    	$url = Url::to(['article/articles-by-categorie','key'=>$key,'cat'=>$cat]) ;

	    	if($articles['status']==true){
	    			return $this->render('index',[
		            'articles' => $articles,
		            'url' =>$url
		        ]);

	    	}else{
	    		return $this->render('index-0',['articles' => $articles]);
	    	}
    }
}
