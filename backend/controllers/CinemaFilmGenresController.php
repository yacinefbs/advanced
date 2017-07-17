<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaFilmGenres;
use backend\models\CinemaFilmGenresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CinemaFilmGenresController implements the CRUD actions for CinemaFilmGenres model.
 */
class CinemaFilmGenresController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all CinemaFilmGenres models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaFilmGenresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaFilmGenres model.
     * @param integer $ID
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     */
    public function actionView($ID, $film_id, $genre_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ID, $film_id, $genre_id),
        ]);
    }

    /**
     * Creates a new CinemaFilmGenres model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaFilmGenres();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaFilmGenres model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $ID
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     */
    public function actionUpdate($ID, $film_id, $genre_id)
    {
        $model = $this->findModel($ID, $film_id, $genre_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ID' => $model->ID, 'film_id' => $model->film_id, 'genre_id' => $model->genre_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaFilmGenres model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $ID
     * @param integer $film_id
     * @param integer $genre_id
     * @return mixed
     */
    public function actionDelete($ID, $film_id, $genre_id)
    {
        $this->findModel($ID, $film_id, $genre_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CinemaFilmGenres model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $ID
     * @param integer $film_id
     * @param integer $genre_id
     * @return CinemaFilmGenres the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ID, $film_id, $genre_id)
    {
        if (($model = CinemaFilmGenres::findOne(['ID' => $ID, 'film_id' => $film_id, 'genre_id' => $genre_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
