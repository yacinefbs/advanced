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
			return array('status'=>true, 'data'=> 'L\'aricle a été ajouté avec succès');
		}
		else{
			return array('status'=>false, 'data'=>$article->getErrors());
		}

	}

	public function actionListArticle($page, $key){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		$minArt = ($page-1)*20;
		$maxArt = $minArt+20;
		$article = Article::findBySql('SELECT * FROM Article where publie=1 LIMIT '.$minArt.','.$maxArt.'')->all();

		$token_key = md5('yacine');

		if($key==$token_key){
			if(count($article)>0){
					return array('status'=>true, 'data'=>$article);
			}
			else{
		    	return array('status'=>false, 'data'=>'Aucun articles trouvés.');
			}
		}
		else{
			return array('status'=>false, 'token' => 'Key invalide');
		}
	}

	public function actionListArticleByCategorie($cat, $page, $key){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

		$minArt = ($page-1)*20;
		$maxArt = $minArt+20;

		// echo $minArt.'   '.$maxArt;

		$articles = Article::findBySql('SELECT * FROM Article art, art_cat a, categorie c where
        a.id_cat=c.id_cat and art.id_art=a.id_art and c.categorie="'.$cat.'" LIMIT '.$minArt.','.$maxArt.'')->all();

		$nbr_article = count($articles);
		$totalPages = ceil($nbr_article/20);


		$tabArtlien =[];
		foreach ($articles as $value) {
			array_push($tabArtlien, 'article/list-article-by-id&'.$value['id_art']);
		}

		$token_key = md5('yacine');

		if($key==$token_key){
			if(count($articles)>0){
				return array('status'=>true, 'data'=>$articles, 
					        ['totalCount'=> $nbr_article,
					        'pageCount'=> $totalPages,
					        'currentPage'=> $page,
					        'perPage'=> 20],
					$tabArtlien
	    		);
			}
			else{
		    	return array('status'=>false, 'data'=>'Aucun articles trouvés.');
			}
		}
		else{
			return array('status'=>false, 'token' => 'Key invalide');
		}

	}

	public function actionListArticleById($id, $key){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

		$article = Article::find()
                ->where(['id_art' => $id])
                ->one();



		$token_key = md5('yacine');

		if($key==$token_key){
			if(count($article)>0){
				return array('status'=>true, 'data'=>$article, ['Token_Key'=>$token_key]);
			}
			else{
		    	return array('status'=>false, 'data'=>'Aucun articles trouvés.');
			}
		}
		else{
			return array('status'=>false, 'token' => 'Key invalide');
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
