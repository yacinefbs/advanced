<?php

namespace backend\controllers;

use Yii;
use backend\models\Categorie;
use backend\models\CategorieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategorieController implements the CRUD actions for Categorie model.
 */
class CategorieController extends Controller
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
     * Lists all Categorie models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categorie model.
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
     * Creates a new Categorie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorie();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Categorie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_cat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categorie model.
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
     * Finds the Categorie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categorie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie API
    
    public function actionCreateCategorie(){
        //echo 'This create employee api'; exit;
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // return array('status' => true);

        $categorie = new Categorie();
        $categorie->scenario = Categorie::SCENARIO_CREATE;
        $categorie->attributes = \Yii::$app->request->post();

        if($categorie->validate()){
            $categorie->save();
            return array('status'=>true, 'data'=> 'La catégorie a été ajouté avec succès.');
        }
        else{
            return array('status'=>false, 'data'=>$categorie->getErrors());
        }

    }

    public function actionListCategorie($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        

        $minCat = ($page-1)*20;
        $categorie  = Categorie::findBySql('SELECT * FROM Categorie LIMIT '.$minCat.',20')->all();


        $tabCat =[];
        foreach ($categorie as $key => $value) {
            $val = array('id' => $value['id_cat'], 'categorie' => $value['categorie'], 'url' => 'article/article-by-categorie&cat='.$value['categorie']);
            array_push($tabCat, $val);
        }
        array_push($tabCat, 'Evenement');

        $nbr_categorie = count($categorie);
        $totalPages = ceil($nbr_categorie/20);

        if($key==$token_key){
            if(count($categorie)>0){
                return array('status'=>true, $tabCat,
                        ['totalCount'=> $nbr_categorie,
                        // 'pageCount'=> $totalPages,
                        'currentPage'=> $page,
                        'perPage'=> 20
                    ]
                    );
            }
            else{
                return array('status'=>false, 'data'=>'Aucune catégories trouvées.');
            }
        }
        else{
            return array('status'=>false, 'token' => 'Key invalide');
        }
    }

    public function actionListCategorieById($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $categorie = Categorie::find()
                ->where(['id_cat' => $id])
                ->one();

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($categorie)>0){
                return array('status'=>true, 'data'=>$categorie);
            }
            else{
                return array('status'=>false, 'data'=>'Aucune catégories trouvées.');
            }
        }
        else{
            return array('status'=>false, 'token' => 'Key invalide');
        }
    }

    public function actionSupprimerCategorieById($id){
        $categorie = Categorie::find()
                        ->where(['id_cat'=>$id])->one();
        if($categorie){
            $categorie->delete();
        }
    }

}
