<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_metiers".
 *
 * @property integer $ID
 * @property string $metier_ar
 * @property string $metier_fr
 *
 * @property CinemaFilmEquipe[] $cinemaFilmEquipes
 */
class CinemaMetiers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_metiers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['metier_ar', 'metier_fr'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'metier_ar' => 'Metier Ar',
            'metier_fr' => 'Metier Fr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCinemaFilmEquipes()
    {
        return $this->hasMany(CinemaFilmEquipe::className(), ['metier_id' => 'ID']);
    }
}
