<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "cinema_films".
 *
 * @property integer $idfilm
 * @property string $libelle_fr
 * @property string $libelle_ar
 * @property string $description_fr
 * @property string $description_ar
 * @property string $path_photo
 * @property string $duree
 * @property string $realisateur
 * @property string $acteur
 * @property string $bandAnnonce
 * @property string $date_sortie
 * @property integer $rating
 * @property string $statut
 * @property string $slug
 * @property string $date_crea
 * @property integer $iduser_modif
 * @property string $date_modif
 * @property integer $user_id

 * @property integer $real
 * @property integer $act
 *
 * @property CinemaFilmEquipe[] $cinemaFilmEquipes
 * @property CinemaFilmGenres[] $cinemaFilmGenres
 * @property CinemaFilmPays[] $cinemaFilmPays
 * @property CinemaFilmSalles[] $cinemaFilmSalles
 */
class CinemaFilms extends \yii\db\ActiveRecord
{

    public $real;
    public $act;
    public $genres = [];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_films';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libelle_fr', 'description_fr', 'path_photo', 'duree', 'realisateur', 'acteur', 'bandAnnonce', 'slug', 'iduser_modif', 'date_modif', 'user_id'], 'required'],
            [['description_fr', 'description_ar', 'statut'], 'string'],
            [['date_sortie', 'date_crea', 'date_modif'], 'safe'],
            [['rating', 'iduser_modif', 'user_id'], 'integer'],
            ['duree', 'match', 'pattern' => '/^[a-zA-Z0-9\- \/]*$/' ],
            [['libelle_fr', 'libelle_ar', 'path_photo', 'duree', 'realisateur', 'acteur', 'bandAnnonce', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idfilm' => 'Idfilm',
            'libelle_fr' => 'Libellé (Français)',
            'libelle_ar' => 'Libellé (Arabe)',
            'description_fr' => 'Description (Français)',
            'description_ar' => 'Description (Arabe)',
            'path_photo' => 'Photo',
            'duree' => 'Durée',
            'real' => 'Realisateur',
            'act' => 'Acteur',
            'bandAnnonce' => 'Bande d\'annonce',
            'date_sortie' => 'Date de sortie',
            'rating' => 'Rating',
            'statut' => 'Statut',
            'slug' => 'Slug',
            'date_crea' => 'Date Crea',
            'iduser_modif' => 'Iduser Modif',
            'date_modif' => 'Date Modif',
            'user_id' => 'User ID',
            'real' => 'Réalisateur',
            'act' => 'Acteur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmEquipes()
    {
        return $this->hasMany(CinemaFilmEquipe::className(), ['film_id' => 'idfilm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmGenres()
    {
        return $this->hasMany(CinemaFilmGenres::className(), ['film_id' => 'idfilm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmPays()
    {
        return $this->hasMany(CinemaFilmPays::className(), ['film_id' => 'idfilm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmSalles()
    {
        return $this->hasMany(CinemaFilmSalles::className(), ['idfilm' => 'idfilm']);
    }
}
