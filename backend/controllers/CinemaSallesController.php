<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaSalles;
use backend\models\CinemaFilms;
use backend\models\CinemaSallesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CinemaSallesController implements the CRUD actions for CinemaSalles model.
 */
class CinemaSallesController extends Controller
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
     * Lists all CinemaSalles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaSallesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaSalles model.
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
     * Creates a new CinemaSalles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaSalles();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idSalle]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaSalles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idSalle]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaSalles model.
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
     * Finds the CinemaSalles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CinemaSalles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CinemaSalles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    //Partie JSON : 
    public function actionListSalles($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $countSalle = CinemaSalles::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $salles = CinemaSalles::findBySql('SELECT * FROM cinema_salles order by idSalle desc LIMIT '.$minArt.',5 ')->all();
        
        
        $nbr_salles = count($countSalle);
        $totalPages = ceil($nbr_salles/5);
        $token_key = md5('yacine');

        $tabSalle = [];
        $tabSalle1 = [];

        foreach ($salles as $value) {
            $films = CinemaFilms::findBySql('SELECT * FROM cinema_salles s, cinema_film_salles fs, cinema_films f 
                                                    where f.idfilm=fs.idfilm and s.idSalle=fs.idsalle and 
                                                    s.idSalle='.$value->idSalle)->all();
            $tabSalle = array(
                  'idSalle'    => $value->idSalle,
                  'libellefr'  => $value->libellefr,
                  'libellear'  => $value->libellear,
                  'seance_fr'  => $value->seance_fr,
                  'seance_ar'  => $value->seance_ar,
                  'slug'       => $value->slug,
                  'adresse'    => $value->adresse,
                  'longitude'  => $value->longitude,
                  'latitude'   => $value->latitude,
                  'logo'       => $value->logo,
                  'photo'      => $value->photo,
                  'publier'    => $value->publier,
                  'cree_par'   => $value->cree_par,
                  'date_crea'  => $value->date_crea,
                  'motifie_par'=> $value->modifie_par,
                  'date_modif' => $value->date_modif,
                  'films' => $films
                );

            array_push($tabSalle1, $tabSalle);
        }





        if($key==$token_key){
            if(count($tabSalle1)>0){
                    return array('status'=>true, 'data'=>$tabSalle1,
                        'info'=>['totalCount'=> $nbr_salles,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucune salle trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionSalle($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $salle = CinemaSalles::find()
                ->where(['idSalle' => $id])
                ->one();

        $token_key = md5('yacine');

        if(count($salle)>0){
          $tabSalle = [];
          $tabSalle1 = [];

          $films = CinemaFilms::findBySql('SELECT * FROM cinema_salles s, cinema_film_salles fs, cinema_films f 
                                                      where f.idfilm=fs.idfilm and s.idSalle=fs.idsalle and 
                                                      s.idSalle='.$salle->idSalle)->all();
              $tabSalle = array(
                    'idSalle'    => $salle->idSalle,
                    'libellefr'  => $salle->libellefr,
                    'libellear'  => $salle->libellear,
                    'seance_fr'  => $salle->seance_fr,
                    'seance_ar'  => $salle->seance_ar,
                    'slug'       => $salle->slug,
                    'adresse'    => $salle->adresse,
                    'longitude'  => $salle->longitude,
                    'latitude'   => $salle->latitude,
                    'logo'       => $salle->logo,
                    'photo'      => $salle->photo,
                    'publier'    => $salle->publier,
                    'cree_par'   => $salle->cree_par,
                    'date_crea'  => $salle->date_crea,
                    'motifie_par'=> $salle->modifie_par,
                    'date_modif' => $salle->date_modif,
                    'films' => $films
                  );  

              array_push($tabSalle1, $tabSalle);
         }
         else{
          $tabSalle1=null;
         }     

        if($key==$token_key){
            if(count($tabSalle1)>0){

                return array('status'=>true,  'data'=>$tabSalle1);
            }
            else{
                return array('status'=>false, 'message'=>'Aucune salle trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}
