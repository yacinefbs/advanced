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

    	// var_dump($articles);
    	// exit;

    	// if($token==md5('yacine')){
    		//var_dump($articles);
	    	if(!empty($articles['data'])){

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

	public function actionListArticle($page=1, $key='ef32927ac29584c2a3250028c2c456d7'){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		$minArt = ($page-1)*20;
		$maxArt = $minArt+20;
		$article = Article::findBySql('SELECT * FROM Article where publie=1 LIMIT '.$minArt.',20')->all();
		
		$nbr_article = count($article);
		$totalPages = ceil($nbr_article/20);
		$token_key = md5('yacine');

		if($key==$token_key){
			if(count($article)>0){
					return array('status'=>true, 'data'=>$article,
						['totalCount'=> $nbr_article,
					        // 'pageCount'=> $totalPages,
					        'currentPage'=> $page,
					        'perPage'=> 20]
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

	public function actionListArticleByCategorie($cat, $page, $key){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

		$minArt = ($page-1)*20;
		$maxArt = $minArt+20;

		// echo $minArt.'   '.$maxArt;

		$articles = Article::findBySql('SELECT * FROM Article art, art_cat a, categorie c where
        a.id_cat=c.id_cat and art.id_art=a.id_art and c.categorie="'.$cat.'" LIMIT '.$minArt.',20')->all();

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
					        // 'pageCount'=> $totalPages,
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
