<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaFilmEquipe;
use backend\models\CinemaFilmEquipeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CinemaFilmEquipeController implements the CRUD actions for CinemaFilmEquipe model.
 */
class CinemaFilmEquipeController extends Controller
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
     * Lists all CinemaFilmEquipe models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaFilmEquipeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaFilmEquipe model.
     * @param integer $ID
     * @param integer $film_id
     * @return mixed
     */
    public function actionView($ID, $film_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $film_id),
        ]);
    }

    /**
     * Creates a new CinemaFilmEquipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaFilmEquipe();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'film_id' => $model->film_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaFilmEquipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $film_id
     * @return mixed
     */
    public function actionUpdate($ID, $film_id)
    {
        $model = $this->findModel($ID, $film_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'film_id' => $model->film_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaFilmEquipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $film_id
     * @return mixed
     */
    public function actionDelete($ID, $film_id)
    {
        $this->findModel($ID, $film_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CinemaFilmEquipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $film_id
     * @return CinemaFilmEquipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $film_id)
    {
        if (($model = CinemaFilmEquipe::findOne(['ID' => $ID, 'film_id' => $film_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
