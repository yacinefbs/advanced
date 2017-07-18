<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaGenres;
use backend\models\CinemaGenresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CinemaGenresController implements the CRUD actions for CinemaGenres model.
 */
class CinemaGenresController extends Controller
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
     * Lists all CinemaGenres models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaGenresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaGenres model.
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
     * Creates a new CinemaGenres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaGenres();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaGenres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaGenres model.
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
     * Finds the CinemaGenres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CinemaGenres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CinemaGenres::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

     //Partie JSON : 
    public function actionListGenres($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $countGenres = CinemaGenres::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $genres = CinemaGenres::findBySql('SELECT * FROM cinema_genres order by id desc LIMIT '.$minArt.',5 ')->all();
        
        //créer un fichier json

        /*$fp = fopen('C:\wamp\www\yii\advanced2\backend\web\json\results.json', 'w');
        fwrite($fp, json_encode($article));
        fclose($fp);*/

        $nbr_genres = count($countGenres);
        $totalPages = ceil($nbr_genres/5);
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($genres)>0){
                    return array('status'=>true, 'data'=>$genres,
                        'info'=>['totalCount'=> $nbr_genres,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun genre trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionGenre($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $genre = CinemaGenres::find()
                ->where(['id' => $id])
                ->one();



        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($genre)>0){

                return array('status'=>true,  'data'=>$genre);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun genre trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}