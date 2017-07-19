<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaEquipe;
use backend\models\CinemaEquipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CinemaEquipeController implements the CRUD actions for CinemaEquipe model.
 */
class CinemaEquipeController extends Controller
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
     * Lists all CinemaEquipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaEquipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaEquipe model.
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
     * Creates a new CinemaEquipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaEquipe();

        if ($model->load(Yii::$app->request->post())) {

            $file = \yii\web\UploadedFile::getInstance($model, 'photo');
            if($file){
                $imageName = utf8_encode($model->nom);
                $model->photo = UploadedFile::getInstance($model, 'photo');
                $model->photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->photo->extension);
                //Save the path in the db column
                $model->photo = 'uploads/'.$imageName.'.'.$model->photo->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaEquipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $acteurAncien = CinemaEquipe::findBySql('SELECT * FROM Cinema_Equipe WHERE id='.$id)->one();
        if ($model->load(Yii::$app->request->post())) {

            if($acteurAncien->photo!=''){
                $photo = \yii\web\UploadedFile::getInstance($model, 'photo');
                    if($photo){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->nom);
                        $model->photo = UploadedFile::getInstance($model, 'photo');
                        $model->photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->photo->extension);
                        //Save the path in the db column
                        $model->photo = 'uploads/'.$imageName.'.'.$model->photo->extension;
                            
                             //Supprimer l'ancienne image
                        if($acteurAncien->photo!=$model->photo){
                            if(isset($acteurAncien->photo)){
                                unlink($acteurAncien->photo);
                            }
                        }
                    }

               
            }
            else{
                    $photo = \yii\web\UploadedFile::getInstance($model, 'photo');
                    if($photo){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->nom);
                        $model->photo = UploadedFile::getInstance($model, 'photo');
                        $model->photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->photo->extension);
                        //Save the path in the db column
                        $model->photo = 'uploads/'.$imageName.'.'.$model->photo->extension;
                    }
            }
            if($acteurAncien->photo!=''){
                $photo = \yii\web\UploadedFile::getInstance($model, 'photo');
                    if(!$photo){
                        $model->photo = $acteurAncien->photo;
                    }
            }




            $model->save();
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaEquipe model.
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
     * Finds the CinemaEquipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CinemaEquipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CinemaEquipe::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    //Partie JSON : 
    public function actionListEquipes($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $equipeForCount = CinemaEquipe::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $equipe = CinemaEquipe::findBySql('SELECT * FROM cinema_equipe order by id desc LIMIT '.$minArt.',5 ')->all();
        
        
        $nbr_equipe = count($equipeForCount);
        $totalPages = ceil($nbr_equipe/5);
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($equipe)>0){
                    return array('status'=>true, 'data'=>$equipe,
                        'info'=>['totalCount'=> $nbr_equipe,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun membre trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionEquipe($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $equipe = CinemaEquipe::find()
                ->where(['id' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($equipe)>0){

                return array('status'=>true,  'data'=>$equipe);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun membre trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}