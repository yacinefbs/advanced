<?php

namespace backend\controllers;

use Yii;
use backend\models\Client;
use backend\models\ClientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClientController implements the CRUD actions for Client model.
 */
class ClientController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public $layout="mainLTE";
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Client models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Client model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Client model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Client();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_clt]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Client model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_clt]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Client model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Client model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Client the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Client::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie API

    public function actionCreateClient(){
        //echo 'This create employee api'; exit;
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // return array('status' => true);

        $client = new Client();
        $client->scenario = Client::SCENARIO_CREATE;
        $client->attributes = \Yii::$app->request->post();

        if($client->validate()){
            $client->save();
            return array('status'=>true, 'data'=> 'Le client a été ajouté avec succès.');
        }
        else{
            return array('status'=>false, 'data'=>$client->getErrors());
        }

    }

    public function actionListClient($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // $client  = Client::find()->all();

        $minClt = ($page-1)*20;
        $client  = Client::findBySql('SELECT * FROM Client LIMIT '.$minClt.',20')->all();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($client)>0){
                return array('status'=>true, 'data'=>$client);
            }
            else{
                return array('status'=>false, 'data'=>'Aucun clients trouvés.');
            }
        }
        else{
            return array('status'=>false, 'token' => 'Key invalide');
        }
    }

    public function actionListClientById($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // $article  = Article::find()->all();
        // echo "here"; exi
        // $id=1;
        $client = Client::find()
                ->where(['id_clt' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($client)>0){
                return array('status'=>true, 'data'=>$client);
            }
            else{
                return array('status'=>false, 'data'=>'Aucun clients trouvés.');
            }
        }
        else{
            return array('status'=>false, 'token' => 'Key invalide');
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
