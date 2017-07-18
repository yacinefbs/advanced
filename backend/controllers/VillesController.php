<?php

namespace backend\controllers;

use Yii;
use backend\models\Villes;
use backend\models\Pays;
use backend\models\VillesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VillesController implements the CRUD actions for Villes model.
 */
class VillesController extends Controller
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
     * Lists all Villes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VillesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Villes model.
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
     * Creates a new Villes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Villes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Villes model.
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
     * Deletes an existing Villes model.
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
     * Finds the Villes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Villes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Villes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

      //Partie JSON : 
    public function actionListVilles($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $countVille = Villes::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $villes = Villes::findBySql('SELECT * FROM villes order by id desc LIMIT '.$minArt.',5 ')->all();
        
        
        $nbr_villes = count($countVille);
        $totalPages = ceil($nbr_villes/5);
        $token_key = md5('yacine');

        $tabVille = [];
        $tabVille1 = [];


        foreach ($villes as $value) {
            $pays = Pays::findBySql('SELECT * FROM villes v, pays p where p.id=v.pays_id and v.id='.$value->id)->all();

//             echo 'ville : '.count($villes);
//             echo 'pays  : '.count($pays);
// exit;
            $tabVille = array(
                  'id'         => $value->id,
                  'nom_fr'     => $value->nom_fr,
                  'nom_ar'     => $value->nom_ar,
                  'slug'       => $value->slug,
                  'publier'    => $value->publier,
                  'flag_meteo' => $value->flag_meteo,
                  'pays'       => $pays
                );

            array_push($tabVille1, $tabVille);
        }

        if($key==$token_key){
            if(count($tabVille1)>0){
                    return array('status'=>true, 'data'=>$tabVille1,
                        'info'=>['totalCount'=> $nbr_villes,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucune ville trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionVille($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $ville = Villes::find()
                ->where(['id' => $id])
                ->one();
        if(count($ville)>0){
            $pays = Pays::findBySql('SELECT * FROM villes v, pays p where p.id=v.pays_id and v.id='.$ville->id)->all();
            $tabVille1 = [];
            $tabVille = array(
                      'id'         => $ville->id,
                      'nom_fr'     => $ville->nom_fr,
                      'nom_ar'     => $ville->nom_ar,
                      'slug'       => $ville->slug,
                      'publier'    => $ville->publier,
                      'flag_meteo' => $ville->flag_meteo,
                      'pays'       => $pays
                    );

            array_push($tabVille1, $tabVille);
        }
        else{
            $tabVille1=null;
        }
        $token_key = md5('yacine');

        if($key==$token_key){
            if(count($tabVille1)>0){

                return array('status'=>true,  'data'=>$tabVille1);
            }
            else{
                return array('status'=>false, 'message'=>'Aucune ville trouvée.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }
}
