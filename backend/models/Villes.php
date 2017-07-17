<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "villes".
 *
 * @property integer $id
 * @property string $nom_fr
 * @property string $nom_ar
 * @property string $slug
 * @property integer $publier
 * @property integer $flag_meteo
 * @property integer $pays_id
 *
 * @property CinemaSalles[] $cinemaSalles
 * @property Pays $pays
 */
class Villes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'villes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom_fr', 'nom_ar', 'slug', 'publier', 'flag_meteo', 'pays_id'], 'required'],
            [['publier', 'flag_meteo', 'pays_id'], 'integer'],
            [['nom_fr', 'nom_ar', 'slug'], 'string', 'max' => 200],
            [['pays_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pays::className(), 'targetAttribute' => ['pays_id' => 'id']],
            ['nom_fr', 'match', 'pattern' => '/^[a-zA-Zéèâêîô \-\/]*$/' ],
            
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
            'flag_meteo' => 'Flag Meteo',
            'pays_id' => 'Pays ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaSalles()
    {
        return $this->hasMany(CinemaSalles::className(), ['idville' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPays()
    {
        return $this->hasOne(Pays::className(), ['id' => 'pays_id']);
    }
}
