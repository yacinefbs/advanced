<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_equipe".
 *
 * @property integer $ID
 * @property string $nom
 * @property string $nationalite
 * @property string $date_naissance
 * @property string $biographie
 * @property string $photo
 * @property string $slug
 *
 * @property CinemaFilmEquipe[] $cinemaFilmEquipes
 */
class CinemaEquipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'cinema_equipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_naissance'], 'safe'],
            [['biographie'], 'string'],
            [['nom', 'nationalite'], 'string', 'max' => 100],
            [['photo', 'slug'], 'string', 'max' => 200],
            ['nom', 'match', 'pattern' => '/^[a-zA-Zéèâêîô\- \/]*$/' ],
            [['nom', 'nationalite', 'date_naissance', 'biographie', 'photo', 'slug'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nom' => 'Nom',
            'nationalite' => 'Nationalité',
            'date_naissance' => 'Date Naissance',
            'biographie' => 'Biographie',
            'photo' => 'Photo',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmEquipes()
    {
        return $this->hasMany(CinemaFilmEquipe::className(), ['equipe_id' => 'ID']);
    }
}
