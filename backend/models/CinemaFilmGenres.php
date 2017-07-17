<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_film_genres".
 *
 * @property integer $ID
 * @property integer $film_id
 * @property integer $genre_id
 *
 * @property CinemaGenres $genre
 * @property CinemaFilms $film
 */
class CinemaFilmGenres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_film_genres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['film_id', 'genre_id'], 'required'],
            [['film_id', 'genre_id'], 'integer'],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaGenres::className(), 'targetAttribute' => ['genre_id' => 'id']],
            [['film_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaFilms::className(), 'targetAttribute' => ['film_id' => 'idfilm']],
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
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(CinemaGenres::className(), ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(CinemaFilms::className(), ['idfilm' => 'film_id']);
    }
}
