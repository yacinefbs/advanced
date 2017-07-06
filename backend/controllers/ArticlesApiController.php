<?php

namespace backend\controllers;

use Yii;
use backend\models\ArticlesApi;
use backend\models\ArticlesApiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl; 
use yii\web\UploadedFile;

/**
 * ArticlesApiController implements the CRUD actions for ArticlesApi model.
 */
class ArticlesApiController extends Controller
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
     * Lists all ArticlesApi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticlesApiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticlesApi model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {      
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArticlesApi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticlesApi();

        if ($model->load(Yii::$app->request->post())) {


            $file = \yii\web\UploadedFile::getInstance($model, 'image');
            if($file){
                $imageName = utf8_encode($model->surTitre);
                var_dump('imagedd : '.$imageName);
                // exit;
                $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->image->extension);
                //Save the path in the db column
                $model->image = 'http://localhost'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->image->extension;
            }



            $model->article_year = date("Y");
            $model->imgcaption = $model->surTitre;
            $model->auteur_id = strval(Yii::$app->user->getId()); //à verifier
            $model->creepar_id = strval(Yii::$app->user->getId());
            $model->modifpar_id = strval(Yii::$app->user->getId());
            
            // $model->is_comment = '0';
            // $model->is_slider = '0';
            // $model->statut = '1';
            // $model->is_galerie = '0';
            // $model->is_video = '0';
            // $model->is_audio = '0';
            // $model->is_social = '0';
            // $model->idOut = 1;
            // $model->idParent = 1;
            // $model->origine_id = 1;
            

            // var_dump($model);
            // exit;

            $model->save();
            // var_dump($model->getErrors());
            // exit;
            

            return $this->redirect(['view', 'id' => $model->idContent]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticlesApi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $articleAncien = ArticlesApi::findBySql('SELECT * FROM Articles_api WHERE idContent='.$model->idContent)->one();
        var_dump($articleAncien->image);
        if ($model->load(Yii::$app->request->post())) {

            $file = \yii\web\UploadedFile::getInstance($model, 'image');
            if($articleAncien->image!=''){

                    if($file){

                        //get the instance of the upload file
                        $imageName = utf8_encode($model->surTitre);
                        $model->image = UploadedFile::getInstance($model, 'image');
                        // echo 'imageName'.$imageName;
                        // exit;
                        $model->image->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->image->extension);
                        //Save the path in the db column
                        $model->image = 'http://localhost/'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->image->extension;
                            
                             //Supprimer l'ancienne image
                        if($articleAncien->image!=$model->image){
                            $url = substr($articleAncien->image, 17);
                            $url = 'C:/wamp/www/'.$url;
                            if(isset($url)){
                                unlink($url);
                            }
                        }
                    }
                }
                    else{

                            if($file){
                                //get the instance of the upload file
                                $imageName = utf8_encode($model->surTitre);
                                $model->image = UploadedFile::getInstance($model, 'image');
                                $model->image->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->image->extension);
                                //Save the path in the db column
                                $model->image = 'http://localhost/'.Yii::$app->request->baseUrl.'/uploads/'.$imageName.'.'.$model->image->extension;
                            }
                    }

                    if($articleAncien->image!=''){

                        $file = \yii\web\UploadedFile::getInstance($model, 'image');
                            if(!$file){
                                $model->image = $articleAncien->image;
                            }
                    }

                    $model->article_year = date('Y');
                    $model->auteur_id = strval(Yii::$app->user->getId()); //à verifier
                    $model->creepar_id = strval(Yii::$app->user->getId());
                    $model->modifpar_id = strval(Yii::$app->user->getId());

                    $model->save();
                    return $this->redirect(['view', 'id' => $model->idContent]);

                } else {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
    }

    /**
     * Deletes an existing ArticlesApi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $articleApi = ArticlesApi::findOne($id);
        $this->findModel($id)->delete();
        // var_dump($articleApi); 
        if($articleApi->image>0){
            $url = substr($articleApi->image, 17);
            $url = 'C:/wamp/www/'.$url;
            unlink($url);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticlesApi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ArticlesApi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticlesApi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



///Partie Api

    public function actionListArticle($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $articleForCount  = $articleForCount  = ArticlesApi::find()->where('statut=1')->all();
        
        $minArt = ($page-1)*5;
        // $maxArt = $minArt+5;
        $article = ArticlesApi::findBySql('SELECT * FROM Articles_api where statut=1 order by idContent desc LIMIT '.$minArt.',5 ')->all();
        
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
        // $maxArt = $minArt+5;
        $articlesForCount = ArticlesApi::findBySql('SELECT * FROM Articles_api art, categorie c where
        art.idRubrique=c.id_cat and c.categorie="'.$cat.'" and statut=1')->all();
        // echo $minArt.'   '.$maxArt;

        $articles = ArticlesApi::findBySql('SELECT * FROM Articles_api art, categorie c where
        art.idRubrique=c.id_cat and c.categorie="'.$cat.'" order by art.idContent desc LIMIT '.$minArt.',5')->all();

        $nbr_article = count($articlesForCount);
        $totalPages = ceil($nbr_article/5);


        $tabArtlien =[];
        foreach ($articles as $value) {
            array_push($tabArtlien, 'article/list-article-by-id&'.$value['idContent']);
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

            $article = ArticlesApi::find()
                    ->where(['idContent' => $id])
                    ->one();

            $token_key = md5('yacine');

            if($key==$token_key){
                if(count($article)>0){
                    $articleObg = $article = ArticlesApi::find()
                                ->where(['idContent' => $id])
                                ->one();

                    $articleObg->count_views = $articleObg->count_views + 1;
                    $articleObg->save();
                    return array('status'=>true, 'data'=>$article);
                }
                else{
                    return array('status'=>false, 'message'=>'Aucun article trouvé.');
                }
            }
            else{
                return array('status'=>false, 'message' => 'La clé est invalide');
            }
        }


        public function actionSupprimerArticleById($id){
        // $article = ArticlesApi::find()
        //                 ->where(['id_art'=>$id])->one();
        // if($article){
        //     $article->delete();
        // }

        $articleApi = ArticlesApi::findOne($id);
        $this->findModel($id)->delete();
        // var_dump($articleApi); 
        if($articleApi->image>0){
            $url = substr($articleApi->image, 17);
            $url = 'C:/wamp/www/'.$url;
            unlink($url);
        }
    }
}
