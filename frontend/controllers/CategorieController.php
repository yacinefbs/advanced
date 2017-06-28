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
			return array('status'=>true, 'data'=> 'La catégorie a été ajouté avec succès.');
		}
		else{
			return array('status'=>false, 'data'=>$categorie->getErrors());
		}

	}

	public function actionListCategorie(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$categorie  = Categorie::find()->all();


		$tabCat =[];
		foreach ($categorie as $key => $value) {
			$val = array('id' => $value['id_cat'], 'categorie' => $value['categorie'], 'url' => 'article/article-by-categorie&cat='.$value['categorie']);
			array_push($tabCat, $val);
		}
		array_push($tabCat, 'Evenement');


		$token_key = md5('yacine');

		if(count($categorie)>0){
			return array('status'=>true, $tabCat, ['Token_Key'=>$token_key]);
		}
		else{
	    	return array('status'=>false, 'data'=>'Aucune catégories trouvées.');
		}
	}

	public function actionListCategorieById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

		$categorie = Categorie::find()
                ->where(['id_cat' => $id])
                ->one();

		$token_key = md5('yacine');

		if(count($categorie)>0){
			return array('status'=>true, 'data'=>$categorie, ['Token_Key'=>$token_key]);
		}
		else{
	    	return array('status'=>false, 'data'=>'Aucune catégories trouvées.');
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
