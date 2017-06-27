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

    public function actionCreateCategorie(){
		//echo 'This create employee api'; exit;
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// return array('status' => true);

		$categorie = new Categorie();
		$categorie->scenario = Categorie::SCENARIO_CREATE;
		$categorie->attributes = \Yii::$app->request->post();

		if($categorie->validate()){
			$categorie->save();
			return array('status'=>true, 'data'=> 'article created successfully');
		}
		else{
			return array('status'=>false, 'data'=>$categorie->getErrors());
		}

	}

	public function actionListCategorie(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$categorie  = Categorie::find()->all();

		if(count($categorie)>0){
			return array('status'=>true, 'data'=>$categorie);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionListCategorieById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		// echo "here"; exi
		// $id=1;
		$categorie = Categorie::find()
                ->where(['id_cat' => $id])
                ->one();

		if(count($categorie)>0){
			return array('status'=>true, 'data'=>$categorie);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionSupprimerCategorieById($id){
		$categorie = Categorie::find()
						->where(['id_cat'=>$id])->one();
		if($categorie){
			$categorie->delete();
		}
	}

}
