<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_salles".
 *
 * @property integer $idSalle
 * @property string $libellefr
 * @property string $libellear
 * @property string $seance_fr
 * @property string $seance_ar
 * @property string $slug
 * @property string $adresse
 * @property string $longitude
 * @property string $latitude
 * @property string $logo
 * @property string $photo
 * @property string $publier
 * @property integer $cree_par
 * @property string $date_crea
 * @property integer $modifie_par
 * @property string $date_modif
 *
 * @property CinemaFilmSalles[] $cinemaFilmSalles
 * @property CinemaSalleVilles[] $cinemaSalleVilles
 */
class CinemaSalles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $villes = [];
    public static function tableName()
    {
        return 'cinema_salles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slug', 'adresse', 'longitude', 'latitude', 'logo', 'photo', 'cree_par'], 'required'],
            [['publier'], 'string'],
            [['cree_par', 'modifie_par'], 'integer'],
            [['date_crea', 'date_modif'], 'safe'],
            [['libellefr', 'libellear', 'seance_fr', 'seance_ar', 'slug'], 'string', 'max' => 255],
            [['adresse', 'logo', 'photo'], 'string', 'max' => 200],
            [['longitude', 'latitude'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSalle' => 'Id Salle',
            'libellefr' => 'libellefr',
            'libellear' => 'libellear',
            'seance_fr' => 'Seance Fr',
            'seance_ar' => 'Seance Ar',
            'slug' => 'Slug',
            'adresse' => 'Adresse',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'logo' => 'Logo',
            'photo' => 'Photo',
            'publier' => 'Publier',
            'cree_par' => 'Cree Par',
            'date_crea' => 'Date Crea',
            'modifie_par' => 'Modifie Par',
            'date_modif' => 'Date Modif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmSalles()
    {
        return $this->hasMany(CinemaFilmSalles::className(), ['idsalle' => 'idSalle']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaSalleVilles()
    {
        return $this->hasMany(CinemaSalleVilles::className(), ['salle_id' => 'idSalle']);
    }
}
