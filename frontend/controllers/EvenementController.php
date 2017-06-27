<?php

namespace frontend\controllers;
use frontend\models\Evenement;

class EvenementController extends \yii\web\Controller
{

	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateEvenement(){
		//echo 'This create employee api'; exit;
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// return array('status' => true);

		$evenement = new Evenement();
		$evenement->scenario = Evenement::SCENARIO_CREATE;
		$evenement->attributes = \Yii::$app->request->post();

		// $evenement->id_user = \Yii::$app->user->id;

		if($evenement->validate()){
			$evenement->save();
			return array('status'=>true, 'data'=> 'article created successfully');
		}
		else{
			return array('status'=>false, 'data'=>$evenement->getErrors());
		}

	}

	public function actionListEvenement(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$evenement  = Evenement::find()->all();

		if(count($evenement)>0){
			return array('status'=>true, 'data'=>$evenement);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionListEvenementById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		// echo "here"; exi
		// $id=1;
		$evenement = Evenement::find()
                ->where(['id_eve' => $id])
                ->one();

		if(count($evenement)>0){
			return array('status'=>true, 'data'=>$evenement);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionSupprimerEvenementById($id){
		$evenement = Evenement::find()
						->where(['id_eve'=>$id])->one();
		if($evenement){
			$evenement->delete();
		}
	}

}
