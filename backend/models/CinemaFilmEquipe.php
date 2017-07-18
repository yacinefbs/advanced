<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_film_equipe".
 *
 * @property integer $ID
 * @property integer $film_id
 * @property integer $metier_id
 * @property integer $equipe_id
 *
 * @property CinemaFilms $film
 * @property CinemaEquipe $equipe
 * @property CinemaMetiers $metier
 */
class CinemaFilmEquipe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_film_equipe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'metier_id', 'equipe_id'], 'required'],
            [['film_id', 'metier_id', 'equipe_id'], 'integer'],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaFilms::className(), 'targetAttribute' => ['film_id' => 'idfilm']],
            [['equipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaEquipe::className(), 'targetAttribute' => ['equipe_id' => 'ID']],
            [['metier_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaMetiers::className(), 'targetAttribute' => ['metier_id' => 'ID']],
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
            'metier_id' => 'Métier ID',
            'equipe_id' => 'Equipe ID',
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
    public function getEquipe()
    {
        return $this->hasOne(CinemaEquipe::className(), ['ID' => 'equipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetier()
    {
        return $this->hasOne(CinemaMetiers::className(), ['ID' => 'metier_id']);
    }
}
