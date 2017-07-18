<?php

namespace backend\controllers;

use Yii;
use backend\models\Pays;
use backend\models\PaysSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaysController implements the CRUD actions for Pays model.
 */
class PaysController extends Controller
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
     * Lists all Pays models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pays model.
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
     * Creates a new Pays model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pays();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pays model.
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
     * Deletes an existing Pays model.
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
     * Finds the Pays model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pays the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pays::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie JSON : 
    public function actionListPays($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $countPays = Pays::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $pays = Pays::findBySql('SELECT * FROM pays order by id desc LIMIT '.$minArt.',5 ')->all();
        
        
        $nbr_pays = count($countPays);
        $totalPages = ceil($nbr_pays/5);
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($pays)>0){
                    return array('status'=>true, 'data'=>$pays,
                        'info'=>['totalCount'=> $nbr_pays,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun pays trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionPays($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $pays = Pays::find()
                ->where(['id' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($pays)>0){

                return array('status'=>true,  'data'=>$pays);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun pays trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}
