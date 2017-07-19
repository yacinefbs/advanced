<?php

namespace backend\controllers;

use Yii;
use backend\models\CinemaFilms;
use backend\models\CinemaFilmsSearch;
use backend\models\CinemaGenres;
use backend\models\Pays;
use backend\models\Villes;
use backend\models\CinemaEquipe;
use backend\models\CinemaSalles;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * CinemaFilmsController implements the CRUD actions for CinemaFilms model.
 */
class CinemaFilmsController extends Controller
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
     * Lists all CinemaFilms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CinemaFilmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CinemaFilms model.
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
     * Creates a new CinemaFilms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CinemaFilms();

        if ($model->load(Yii::$app->request->post())) {


            var_dump($model);
            exit;

            //Upload photo
            $file = \yii\web\UploadedFile::getInstance($model, 'path_photo');
            if($file){
                $imageName = utf8_encode($model->libelle_fr);
                $model->path_photo = UploadedFile::getInstance($model, 'path_photo');
                $model->path_photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->path_photo->extension);
                //Save the path in the db column
                $model->path_photo = 'uploads/'.$imageName.'.'.$model->path_photo->extension;
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->idfilm]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CinemaFilms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //Début : Modification du path photo film
            $filmAncien = CinemaFilms::findBySql('SELECT * FROM cinema_films WHERE id='.$id)->one();
            if($filmAncien->path_photo!=''){
                $path_photo = \yii\web\UploadedFile::getInstance($model, 'path_photo');
                    if($path_photo){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->libelle_fr);
                        $model->path_photo = UploadedFile::getInstance($model, 'path_photo');
                        $model->path_photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->path_photo->extension);
                        //Save the path in the db column
                        $model->path_photo = 'uploads/'.$imageName.'.'.$model->path_photo->extension;
                            
                             //Supprimer l'ancienne image
                        if($filmAncien->path_photo!=$model->path_photo){
                            if(isset($filmAncien->path_photo)){
                                unlink($filmAncien->path_photo);
                            }
                        }
                    }

               
            }
            else{
                    $path_photo = \yii\web\UploadedFile::getInstance($model, 'path_photo');
                    if($path_photo){
                        //get the instance of the upload file
                        $imageName = utf8_encode($model->libelle_fr);
                        $model->path_photo = UploadedFile::getInstance($model, 'path_photo');
                        $model->path_photo->saveAs('uploads/'.utf8_decode($imageName).'.'.$model->path_photo->extension);
                        //Save the path in the db column
                        $model->path_photo = 'uploads/'.$imageName.'.'.$model->path_photo->extension;
                    }
            }
            if($filmAncien->path_photo!=''){
                $path_photo = \yii\web\UploadedFile::getInstance($model, 'path_photo');
                    if(!$path_photo){
                        $model->path_photo = $filmAncien->path_photo;
                    }
            }


            //Fin   : Modification du path photo film



            $model->save();
            return $this->redirect(['view', 'id' => $model->idfilm]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CinemaFilms model.
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
     * Finds the CinemaFilms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CinemaFilms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CinemaFilms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


     //Partie JSON : 
    public function actionListFilms($page, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
        $filmForCount = CinemaFilms::find()->all();
        
        $minArt = ($page-1)*5;
        $maxArt = $minArt+5;
        $films = CinemaFilms::findBySql('SELECT * FROM cinema_films order by idfilm desc LIMIT '.$minArt.',5 ')->all();
        
          $tabFilmGenre = [];
          $tabFilmGenre1 = [];
          foreach ($films as $value) {
              // \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
              $genres = CinemaGenres::findBySql('SELECT * FROM cinema_genres g, cinema_film_genres fg, cinema_films f 
                                                      where f.idfilm=fg.film_id and g.id=fg.genre_id and 
                                                      f.idfilm='.$value->idfilm)->all();
              $pays = Pays::findBySql('SELECT * FROM pays p, cinema_film_pays fp, cinema_films f 
                                                      where f.idfilm=fp.film_id and p.id=fp.pays_id and 
                                                      f.idfilm='.$value->idfilm)->all();
              $salles = CinemaSalles::findBySql('SELECT * FROM cinema_salles s, cinema_film_salles fs, cinema_films f 
                                                      where f.idfilm=fs.idfilm and s.idSalle=fs.idsalle and 
                                                      f.idfilm='.$value->idfilm)->all();


              
              $salle1 = [];
              $salle2 = [];
              foreach ($salles as $valueSalle) {
                $villes = Villes::findBySql('SELECT * FROM cinema_salles s, cinema_salle_villes sv, villes v where s.idSalle=sv.salle_id and sv.ville_id=v.id and s.idSalle='.$valueSalle->idSalle)->all();
                $salle1 = array(
                    'idSalle' => $valueSalle->idSalle,
                    'libellefr' => $valueSalle->libellefr,
                    'libellear' => $valueSalle->libellear,
                    'seance_fr'  => $valueSalle->seance_fr,
                    'seance_ar'  => $valueSalle->seance_ar,
                    'slug'       => $valueSalle->slug,
                    'adresse'    => $valueSalle->adresse,
                    'longitude'  => $valueSalle->longitude,
                    'latitude'   => $valueSalle->latitude,
                    'logo'       => $valueSalle->logo,
                    'photo'      => $valueSalle->photo,
                    'publier'    => $valueSalle->publier,
                    'cree_par'   => $valueSalle->cree_par,
                    'date_crea'  => $valueSalle->date_crea,
                    'motifie_par'=> $valueSalle->modifie_par,
                    'date_modif' => $valueSalle->date_modif,
                    'ville'      => $villes
                  );
                array_push($salle2, $salle1);
              }

              $realisateurs = CinemaEquipe::findBySql('SELECT * FROM cinema_equipe e, cinema_film_equipe fe, cinema_films f, cinema_metiers m
                                                      where f.idfilm=fe.film_id and e.id=fe.equipe_id and m.id=fe.metier_id and 
                                                      m.metier_fr="Réalisateur" and f.idfilm='.$value->idfilm)->all();

              $acteurs = CinemaEquipe::findBySql('SELECT * FROM cinema_equipe e, cinema_film_equipe fe, cinema_films f, cinema_metiers m
                                                      where f.idfilm=fe.film_id and e.id=fe.equipe_id and m.id=fe.metier_id and m.metier_fr="Acteur" and f.idfilm='.$value->idfilm)->all();

              // var_dump($realisateurs);
              // exit;

              $tabFilmGenre = array(
                                    'idfilm'        =>$value->idfilm,
                                    'libelle_fr'    =>$value->libelle_fr,
                                    'libelle_ar'    =>$value->libelle_ar,
                                    'description_fr'=>$value->description_fr,
                                    'description_ar'=>$value->description_ar,
                                    'path_photo'    =>$value->path_photo,
                                    'duree'         =>$value->duree,
                                    'realisateur'   =>$value->realisateur,
                                    'acteur'        =>$value->acteur,
                                    'bandAnnonce'   =>$value->bandAnnonce,
                                    'date_sortie'   =>$value->date_sortie,
                                    'rating'        =>$value->rating,
                                    'statut'        =>$value->statut,
                                    'slug'          =>$value->slug,
                                    'date_crea'     =>$value->date_crea,
                                    'iduser_modif'  =>$value->iduser_modif,
                                    'date_modif'    =>$value->date_modif,
                                    'user_id'       =>$value->user_id,
                                    'genres'        => $genres,
                                    'pays'          => $pays,
                                    'salles'        => $salle2,
                                    'realisateurs'  => $realisateurs,
                                    'acteurs'       => $acteurs
                                    );
              array_push($tabFilmGenre1, $tabFilmGenre);
          }
          // var_dump($tabFilmGenre1);
          // exit;
          $nbr_films = count($filmForCount);
          $totalPages = ceil($nbr_films/5);
          $token_key = md5('yacine');
        if($key==$token_key){
            if(count($tabFilmGenre1)>0){
                    return array('status'=>true, 'data'=>$tabFilmGenre1,
                        'info'=>['totalCount'=> $nbr_films,
                            // 'pageCount'=> $totalPages,
                            'currentPage'=> $page,
                            'perPage'=> 5]
                         );
            }
            else{
                return array('status'=>false, 'message'=>'Aucun film trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

    public function actionFilm($id, $key){
        \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;

        $film = CinemaFilms::find()
                ->where(['idfilm' => $id])
                ->one();

        if($film){
          $tabFilmGenre = [];
          $tabFilmGenre1 = [];
          // \Yii::$app->response->format = \Yii\web\Response::FORMAT_JSON;
              $genres = CinemaGenres::findBySql('SELECT * FROM cinema_genres g, cinema_film_genres fg, cinema_films f 
                                                      where f.idfilm=fg.film_id and g.id=fg.genre_id and 
                                                      f.idfilm='.$film->idfilm)->all();
              $pays = Pays::findBySql('SELECT * FROM pays p, cinema_film_pays fp, cinema_films f 
                                                      where f.idfilm=fp.film_id and p.id=fp.pays_id and 
                                                      f.idfilm='.$film->idfilm)->all();
              $salles = CinemaSalles::findBySql('SELECT * FROM cinema_salles s, cinema_film_salles fs, cinema_films f 
                                                      where f.idfilm=fs.idfilm and s.idSalle=fs.idsalle and 
                                                      f.idfilm='.$film->idfilm)->all();


              
              $salle1 = [];
              $salle2 = [];
              foreach ($salles as $valueSalle) {
                $villes = Villes::findBySql('SELECT * FROM cinema_salles s, cinema_salle_villes sv, villes v where s.idSalle=sv.salle_id and sv.ville_id=v.id and s.idSalle='.$valueSalle->idSalle)->all();
                $salle1 = array(
                    'idSalle'    => $valueSalle->idSalle,
                    'libellefr'  => $valueSalle->libellefr,
                    'libellear'  => $valueSalle->libellear,
                    'seance_fr'  => $valueSalle->seance_fr,
                    'seance_ar'  => $valueSalle->seance_ar,
                    'slug'       => $valueSalle->slug,
                    'adresse'    => $valueSalle->adresse,
                    'longitude'  => $valueSalle->longitude,
                    'latitude'   => $valueSalle->latitude,
                    'logo'       => $valueSalle->logo,
                    'photo'      => $valueSalle->photo,
                    'publier'    => $valueSalle->publier,
                    'cree_par'   => $valueSalle->cree_par,
                    'date_crea'  => $valueSalle->date_crea,
                    'motifie_par'=> $valueSalle->modifie_par,
                    'date_modif' => $valueSalle->date_modif,
                    'ville'      => $villes
                  );
                array_push($salle2, $salle1);
              }

              $realisateurs = CinemaEquipe::findBySql('SELECT * FROM cinema_equipe e, cinema_film_equipe fe, cinema_films f, cinema_metiers m
                                                      where f.idfilm=fe.film_id and e.id=fe.equipe_id and m.id=fe.metier_id and 
                                                      m.metier_fr="Réalisateur" and f.idfilm='.$film->idfilm)->all();

              $acteurs = CinemaEquipe::findBySql('SELECT * FROM cinema_equipe e, cinema_film_equipe fe, cinema_films f, cinema_metiers m
                                                      where f.idfilm=fe.film_id and e.id=fe.equipe_id and m.id=fe.metier_id and m.metier_fr="Acteur" and f.idfilm='.$film->idfilm)->all();

              // var_dump($realisateurs);
              // exit;

              $tabFilmGenre = array(
                                    'idfilm'        =>$film->idfilm,
                                    'libelle_fr'    =>$film->libelle_fr,
                                    'libelle_ar'    =>$film->libelle_ar,
                                    'description_fr'=>$film->description_fr,
                                    'description_ar'=>$film->description_ar,
                                    'path_photo'    =>$film->path_photo,
                                    'duree'         =>$film->duree,
                                    'realisateur'   =>$film->realisateur,
                                    'acteur'        =>$film->acteur,
                                    'bandAnnonce'   =>$film->bandAnnonce,
                                    'date_sortie'   =>$film->date_sortie,
                                    'rating'        =>$film->rating,
                                    'statut'        =>$film->statut,
                                    'slug'          =>$film->slug,
                                    'date_crea'     =>$film->date_crea,
                                    'iduser_modif'  =>$film->iduser_modif,
                                    'date_modif'    =>$film->date_modif,
                                    'user_id'       =>$film->user_id,
                                    'genres'        => $genres,
                                    'pays'          => $pays,
                                    'salles'        => $salle2,
                                    'realisateurs'  => $realisateurs,
                                    'acteurs'       => $acteurs
                                    );
              array_push($tabFilmGenre1, $tabFilmGenre);
        }
        else{
          $tabFilmGenre1 = null;
        }      


          $token_key = md5('yacine');

        if($key==$token_key){
            if(count($tabFilmGenre1)>0){

                return array('status'=>true,  'data'=>$tabFilmGenre1);
            }
            else{
                return array('status'=>false, 'message'=>'Aucun film trouvé.');
            }
        }
        else{
            return array('status'=>false, 'message' => 'La clé est invalide');
        }
    }

}
