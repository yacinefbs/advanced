<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_genres".
 *
 * @property integer $id
 * @property string $genre_fr
 * @property string $genre_ar
 * @property string $slug
 *
 * @property CinemaFilmGenres[] $cinemaFilmGenres
 */
class CinemaGenres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_genres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['genre_fr', 'genre_ar', 'slug'], 'required'],
            [['genre_fr', 'genre_ar'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'genre_fr' => 'Genre Fr',
            'genre_ar' => 'Genre Ar',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmGenres()
    {
        return $this->hasMany(CinemaFilmGenres::className(), ['genre_id' => 'id']);
    }
}
