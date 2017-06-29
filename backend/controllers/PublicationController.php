<?php

namespace backend\controllers;

use Yii;
use backend\models\Publication;
use backend\models\SearchPublication;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * PublicationController implements the CRUD actions for Publication model.
 */
class PublicationController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * @inheritdoc
     */
    public $layout='mainLTE';
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],

            ],

            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create','update', 'delete', 'index'],
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                      // everything else is denied by default
                ],
        ],
        ];
    }

    /**
     * Lists all Publication models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchPublication();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Publication model.
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
     * Creates a new Publication model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
        $model = new Publication();

        if ($model->load(Yii::$app->request->post())) {

            // var_dump($model);
            // die();

            $model->file = UploadedFile::getInstance($model,'file');
             if($model->file){
                $time = time();
                $model->file->saveAs('uploads/pub/' .$time. '.' .$model->file->extension);
                $model->file = 'uploads/pub/' .$time. '.' .$model->file->extension ;
            }
            $model->id_user=Yii::$app->user->id;
            $model->save();
             
            return $this->redirect(['view', 'id' => $model->id_pub]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Publication model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model2 = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) ) {

            $model->file = UploadedFile::getInstance($model,'file');

            if($model->file){
                $time = time();
                $model->file->saveAs('uploads/pub/' .$time. '.' .$model->file->extension);
                $model->file = 'uploads/pub/' .$time. '.' .$model->file->extension ;
                
            }else {

                $model->file = $model2->file;
            }
             
            
            $model->id_user = Yii::$app->user->getId(); 
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_pub]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Publication model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $publication = Publication::findOne($id);
        if(isset($publication->file)){
            unlink($publication->file);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Publication model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publication the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publication::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie API
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

    public function actionListPublication($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // $publication  = Publication::find()->all();
        $minPub = ($page-1)*20;
        $publication = Publication::findBySql('SELECT * FROM Publication LIMIT '.$minPub.',20')->all();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($publication)>0){
                return array('status'=>true, 'data'=>$publication);
            }
            else{
                return array('status'=>false, 'message'=>'Aucune publication trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }    
    }

    public function actionListPublicationById($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // $article  = Article::find()->all();
        // echo "here"; exi
        // $id=1;
        $publication = Publication::find()
                ->where(['id_pub' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($publication)>0){
                return array('status'=>true, 'data'=>$publication);
            }
            else{
                return array('status'=>false, 'message'=>'Aucune publication trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
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
