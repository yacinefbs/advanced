<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaMetiers;
use backend\models\CinemaMetiersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CinemaMetiersController implements the CRUD actions for CinemaMetiers model.
 */
class CinemaMetiersController extends Controller
{
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
     * Lists all CinemaMetiers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaMetiersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaMetiers model.
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
     * Creates a new CinemaMetiers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaMetiers();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaMetiers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaMetiers model.
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
     * Finds the CinemaMetiers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CinemaMetiers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CinemaMetiers::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie JSON : 
    public function actionListMetiers($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $countMetiers = CinemaMetiers::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $metier = CinemaMetiers::findBySql('SELECT * FROM cinema_metiers order by id desc LIMIT '.$minArt.',5 ')->all();
        
        //créer un fichier json

        /*$fp = fopen('C:\wamp\www\yii\advanced2\backend\web\json\results.json', 'w');
        fwrite($fp, json_encode($article));
        fclose($fp);*/

        $nbr_metier = count($countMetiers);
        $totalPages = ceil($nbr_metier/5);
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($metier)>0){
                    return array('status'=>true, 'data'=>$metier,
                        'info'=>['totalCount'=> $nbr_metier,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun métier trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionMetier($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $metier = CinemaMetiers::find()
                ->where(['id' => $id])
                ->one();



        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($metier)>0){

                return array('status'=>true,  'data'=>$metier);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun métier trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}
