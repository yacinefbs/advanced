<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pays".
 *
 * @property integer $id
 * @property string $nom_fr
 * @property string $nom_ar
 * @property string $slug
 * @property integer $publier
 * @property integer $flag
 *
 * @property CinemaFilmPays[] $cinemaFilmPays
 * @property Villes[] $villes
 */
class Pays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['publier', 'flag'], 'integer'],
            [['nom_fr', 'nom_ar', 'slug'], 'string', 'max' => 200],
            ['nom_fr', 'match', 'pattern' => '/^[a-zA-Zéèâêîô\-\/]*$/' ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom_fr' => 'Nom Fr',
            'nom_ar' => 'Nom Ar',
            'slug' => 'Slug',
            'publier' => 'Publier',
            'flag' => 'Flag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmPays()
    {
        return $this->hasMany(CinemaFilmPays::className(), ['pays_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVilles()
    {
        return $this->hasMany(Villes::className(), ['pays_id' => 'id']);
    }
}
