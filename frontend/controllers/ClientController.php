<?php

namespace frontend\controllers;

use frontend\models\CLient;

class ClientController extends \yii\web\Controller
{
	public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreateClient(){
		//echo 'This create employee api'; exit;
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// return array('status' => true);

		$client = new Client();
		$client->scenario = Client::SCENARIO_CREATE;
		$client->attributes = \Yii::$app->request->post();

		if($client->validate()){
			$client->save();
			return array('status'=>true, 'data'=> 'article created successfully');
		}
		else{
			return array('status'=>false, 'data'=>$client->getErrors());
		}

	}

	public function actionListClient(){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		$client  = Client::find()->all();

		if(count($client)>0){
			return array('status'=>true, 'data'=>$client);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionListClientById($id){
		\Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
		// $article  = Article::find()->all();
		// echo "here"; exi
		// $id=1;
		$client = Client::find()
                ->where(['id_clt' => $id])
                ->one();

		if(count($client)>0){
			return array('status'=>true, 'data'=>$client);
		}
		else{
	    	return array('status'=>false, 'data'=>'No articles found.');
		}
	}

	public function actionSupprimerClientById($id){
		$client = Client::find()
						->where(['id_clt'=>$id])->one();
		if($client){
			$client->delete();
		}
	}

}
