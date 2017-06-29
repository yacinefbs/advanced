<?php

namespace backend\controllers;

use Yii;
use backend\models\Evenement;
use backend\models\EvenementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EvenementController implements the CRUD actions for Evenement model.
 */
class EvenementController extends Controller
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
     * Lists all Evenement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EvenementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evenement model.
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
     * Creates a new Evenement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Evenement();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->getId(); 
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_eve]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Evenement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_eve]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Evenement model.
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
     * Finds the Evenement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evenement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Evenement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie API JSON
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

    public function actionListEvenement($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        //$evenement  = Evenement::find()->all();
        $minEve = ($page-1)*20;
        $evenement  = Evenement::findBySql('SELECT * FROM Evenement LIMIT '.$minEve.',20')->all();


        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($evenement)>0){
                return array('status'=>true, 'data'=>$evenement);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun événement trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionListEvenementById($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // $article  = Article::find()->all();
        // echo "here"; exi
        // $id=1;
        $evenement = Evenement::find()
                ->where(['id_eve' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($evenement)>0){
                return array('status'=>true, 'data'=>$evenement);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun événement trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
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
