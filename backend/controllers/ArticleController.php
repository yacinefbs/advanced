<?php

namespace backend\controllers;

use Yii;
use backend\models\Article;
use backend\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use backend\models\ArtCat;
use backend\models\Categorie; 
use yii\helpers\ArrayHelper;
use yii\filters\AccessControl; 



/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        // echo "base : ".Yii::$app->request->baseUrl.'/uploads/';
        // die();

        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Article();
        
        $modelCats = Categorie::find()->all();


        if ($model->load(Yii::$app->request->post())) {
      
        // var_dump($model);
        // die();
        // var_dump($model);
        // die();
        //get the instance of the upload file
        // if(filesize($model->file)>0){
        $file = \yii\web\UploadedFile::getInstance($model, 'file');
        if($file){
            $imageName = utf8_encode($model->titre);
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->file->extension);
            //Save the path in the db column
            $model->file = 'http://localhost'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->file->extension;
        }

        $model->date_art = date('Y-m-d H:i:s');
        $model->id_user = Yii::$app->user->getId(); 
        $model->save();

        //var_dump($_POST);

        //die();
        $listCategories = $_POST['Article']['categories'];

        foreach ($listCategories as $value) {
            $Categorie = Categorie::find()
                ->where(['categorie' => $value])
                ->one(); 
            $newArtCat = new ArtCat();
            $newArtCat->id_art = $model->id_art;
            $newArtCat->id_cat = $Categorie->id_cat;
            $newArtCat->save();
        }

        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_art]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelCats' => $modelCats,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {



        $model = $this->findModel($id);
        $model2 = ArtCat::findBySql('SELECT c.id_cat, c.categorie FROM art_cat a, categorie c where
        a.id_cat=c.id_cat and a.id_art='.$id)->all();
        //$modelCats = Categorie::find()->all();
        $modelCats = Categorie::findBySql('SELECT * FROM categorie')->all();
        $articleAncien = Article::findBySql('SELECT * FROM Article WHERE id_art='.$model->id_art)->one();

        if ($model->load(Yii::$app->request->post())) {
            if($articleAncien->file!=''){
                $file = \yii\web\UploadedFile::getInstance($model, 'file');
                    if($file){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->titre);
                        $model->file = UploadedFile::getInstance($model, 'file');
                        $model->file->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->file->extension);
                        //Save the path in the db column
                        $model->file = 'http://localhost/'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->file->extension;
                            
                             //Supprimer l'ancienne image
                        if($articleAncien->file!=$model->file){
                            if(isset($articleAncien->file)){
                                unlink($articleAncien->file);
                            }
                        }
                    }

               
            }
            else{
                    $file = \yii\web\UploadedFile::getInstance($model, 'file');
                    if($file){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->titre);
                        $model->file = UploadedFile::getInstance($model, 'file');
                        $model->file->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->file->extension);
                        //Save the path in the db column
                        $model->file = 'http://localhost/'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->file->extension;
                    }
                
            }
            if($articleAncien->file!=''){
                $file = \yii\web\UploadedFile::getInstance($model, 'file');
                    if(!$file){
                        $model->file = $articleAncien->file;
                    }
            }

            $model->date_art = date('Y-m-d H:i:s');
            $model->save();
            


            return $this->redirect(['view', 'id' => $model->id_art]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'model2' => $model2,
                'modelCats' => $modelCats,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $article = Article::findOne($id);

        if(isset($article->file)){
            unlink($article->file);
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie API
    public function actionCreateArticle(){
        //echo 'This create employee api'; exit;
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        // return array('status' => true);

        $article = new Article();
        $article->scenario = Article::SCENARIO_CREATE;
        $article->attributes = \Yii::$app->request->post();

        if($article->validate()){
            $article->id_user = Yii::$app->user->id;
            $article->save();
            return array('status'=>true, 'data'=> 'L\'aricle a été ajouté avec succès');
        }
        else{
            return array('status'=>false, 'data'=>$article->getErrors());
        }

    }

    public function actionListArticle($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $articleForCount  = $articleForCount  = Article::find()->where('publie=1')->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $article = Article::findBySql('SELECT * FROM Article where publie=1 order by id_art desc LIMIT '.$minArt.',5 ')->all();
        
        //créer un fichier json

        /*$fp = fopen('C:\wamp\www\yii\advanced2\backend\web\json\results.json', 'w');
        fwrite($fp, json_encode($article));
        fclose($fp);*/

        $nbr_article = count($articleForCount);
        $totalPages = ceil($nbr_article/5);
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($article)>0){
                    return array('status'=>true, 'data'=>$article,
                        'info'=>['totalCount'=> $nbr_article,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun article trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionListArticleByCategorie($cat, $page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $articlesForCount = Article::findBySql('SELECT * FROM Article art, art_cat a, categorie c where
        a.id_cat=c.id_cat and art.id_art=a.id_art and c.categorie="'.$cat.'" and publie=1')->all();
        // echo $minArt.'   '.$maxArt;

        $articles = Article::findBySql('SELECT * FROM Article art, art_cat a, categorie c where
        a.id_cat=c.id_cat and art.id_art=a.id_art and c.categorie="'.$cat.'" order by art.id_art desc LIMIT '.$minArt.',5')->all();

        $nbr_article = count($articlesForCount);
        $totalPages = ceil($nbr_article/5);


        $tabArtlien =[];
        foreach ($articles as $value) {
            array_push($tabArtlien, 'article/list-article-by-id&'.$value['id_art']);
        }

        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($articles)>0){
                return array('status'=>true, 'data'=>$articles, 
                            'info' => ['totalCount'=> $nbr_article,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5],
                    $tabArtlien
                );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun article trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionListArticleById($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $article = Article::find()
                ->where(['id_art' => $id])
                ->one();



        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($article)>0){
                $articleObg = Article::find()
                            ->where(['id_art' => $id])
                            ->one();

                $articleObg->count_views = $articleObg->count_views + 1;
                $articleObg->save();

                $articleObg = Article::find()
                            ->where(['id_art' => $id])
                            ->one();

                return array('status'=>true,  'data'=>$article,
                            'info'=>
                                [
                                    'count_views'=> $articleObg->count_views
                                ]
                            );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun article trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionCountArticle($id){
            \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

                $articleObg = Article::find()
                            ->where(['id_art' => $id])
                            ->one();

                 if(count($articleObg)>0){           
                    $articleObg->count_views = $articleObg->count_views + 1;
                    $articleObg->save();

                    $articleObg = Article::find()
                                ->where(['id_art' => $id])
                                ->one();

                        return array('status'=>true,
                        'info'=>
                            [
                                'count_views'=> $articleObg->count_views
                            ]
                        );
                    }
                    else{
                        return array('status'=>false, 'message'=>'Aucun article trouvé.');
                    }
    }

    public function actionSupprimerArticleById($id){
        $article = Article::find()
                 ->where(['id_art'=>$id])->one();
        if($article){
            $article->delete();
        }
    }
}