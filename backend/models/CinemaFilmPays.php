<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_film_pays".
 *
 * @property integer $ID
 * @property integer $film_id
 * @property integer $pays_id
 *
 * @property CinemaFilms $film
 * @property Pays $pays
 */
class CinemaFilmPays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_film_pays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'pays_id'], 'required'],
            [['film_id', 'pays_id'], 'integer'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaFilms::className(), 'targetAttribute' => ['film_id' => 'idfilm']],
            [['pays_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pays::className(), 'targetAttribute' => ['pays_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'film_id' => 'Film ID',
            'pays_id' => 'Pays ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(CinemaFilms::className(), ['idfilm' => 'film_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPays()
    {
        return $this->hasOne(Pays::className(), ['id' => 'pays_id']);
    }
}
