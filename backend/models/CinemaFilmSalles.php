<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_film_salles".
 *
 * @property integer $id
 * @property integer $idsalle
 * @property integer $idfilm
 *
 * @property CinemaFilms $idfilm0
 * @property CinemaSalles $idsalle0
 */
class CinemaFilmSalles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_film_salles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsalle', 'idfilm'], 'required'],
            [['idsalle', 'idfilm'], 'integer'],
            [['idfilm'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaFilms::className(), 'targetAttribute' => ['idfilm' => 'idfilm']],
            [['idsalle'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaSalles::className(), 'targetAttribute' => ['idsalle' => 'idSalle']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idsalle' => 'Idsalle',
            'idfilm' => 'Idfilm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdfilm0()
    {
        return $this->hasOne(CinemaFilms::className(), ['idfilm' => 'idfilm']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsalle0()
    {
        return $this->hasOne(CinemaSalles::className(), ['idSalle' => 'idsalle']);
    }
}
