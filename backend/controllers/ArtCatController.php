<?php

namespace backend\controllers;

use Yii;
use backend\models\ArtCat;
use backend\models\ArtCatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArtCatController implements the CRUD actions for ArtCat model.
 */
class ArtCatController extends Controller
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
     * Lists all ArtCat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtCatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArtCat model.
     * @param integer $id_art
     * @param integer $id_cat
     * @return mixed
     */
    public function actionView($id_art, $id_cat)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_art, $id_cat),
        ]);
    }

    /**
     * Creates a new ArtCat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArtCat();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_art' => $model->id_art, 'id_cat' => $model->id_cat]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArtCat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_art
     * @param integer $id_cat
     * @return mixed
     */
    public function actionUpdate($id_art, $id_cat)
    {
        $model = $this->findModel($id_art, $id_cat);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_art' => $model->id_art, 'id_cat' => $model->id_cat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArtCat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_art
     * @param integer $id_cat
     * @return mixed
     */
    public function actionDelete($id_art, $id_cat)
    {
        $this->findModel($id_art, $id_cat)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArtCat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_art
     * @param integer $id_cat
     * @return ArtCat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_art, $id_cat)
    {
        if (($model = ArtCat::findOne(['id_art' => $id_art, 'id_cat' => $id_cat])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
