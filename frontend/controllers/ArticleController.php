<?php

namespace frontend\controllers;
use frontend\models\Article;


class ArticleController extends \yii\web\Controller
{

	public $enableCsrfValidation = false;

    public function actionIndex()
    {
    	echo 'This is test'; exit;
        return $this->render('index');
    }

    public function actionCreateArticle(){
		//echo 'This create employee api'; exit;
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// return array('status' => true);

		$article = new Article();
		$article->scenario = Article::SCENARIO_CREATE;
		$article->attributes = \Yii::$app->request->post();

		if($article->validate()){
			$article->id_user = Yii::$app->user->id;
			$article->save();
			return array('status'=>true, 'data'=> 'article created successfully');
		}
		else{
			return array('status'=>false, 'data'=>$article->getErrors());
		}

	}

	public function actionListArticle(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$article  = Article::find()->all();

		if(count($article)>0){
			return array('status'=>true, 'data'=>$article);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionListArticleById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		// echo "here"; exi
		// $id=1;
		$article = Article::find()
                ->where(['id_art' => $id])
                ->one();

		if(count($article)>0){
			return array('status'=>true, 'data'=>$article);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionSupprimerArticleById($id){
		$article = Article::find()
						->where(['id_art'=>$id])->one();
		if($article){
			$article->delete();
		}
	}

}
