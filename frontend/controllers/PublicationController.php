<?php

namespace frontend\controllers;

use frontend\models\Publication;

class PublicationController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreatePublication(){
		//echo 'This create employee api'; exit;
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// return array('status' => true);

		$publication = new Publication();
		$publication->scenario = Publication::SCENARIO_CREATE;
		$publication->attributes = \Yii::$app->request->post();

		if($publication->validate()){
			// $publication->id_user = Yii::$app->user->id;
			$publication->save();
			return array('status'=>true, 'data'=> 'publication created successfully');
		}
		else{
			return array('status'=>false, 'data'=>$publication->getErrors());
		}

	}

	public function actionListPublication(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$publication  = Publication::find()->all();

		if(count($publication)>0){
			return array('status'=>true, 'data'=>$publication);
		}
		else{
	    	return array('status'=>false, 'data'=>'No publications found.');
		}
	}

	public function actionListPublicationById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		// echo "here"; exi
		// $id=1;
		$publication = Publication::find()
                ->where(['id_pub' => $id])
                ->one();

		if(count($publication)>0){
			return array('status'=>true, 'data'=>$publication);
		}
		else{
	    	return array('status'=>false, 'data'=>'No publications found.');
		}
	}

	public function actionSupprimerPublicationById($id){
		$publication = Publication::find()
						->where(['id_pub'=>$id])->one();
		if($publication){
			$publication->delete();
		}
	}

}
