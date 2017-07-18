<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cinema_salle_villes".
 *
 * @property integer $idcinema_salle_villes
 * @property integer $salle_id
 * @property integer $ville_id
 *
 * @property CinemaSalles $salle
 * @property Villes $ville
 */
class CinemaSalleVilles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cinema_salle_villes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcinema_salle_villes', 'salle_id', 'ville_id'], 'required'],
            [['idcinema_salle_villes', 'salle_id', 'ville_id'], 'integer'],
            [['salle_id'], 'exist', 'skipOnError' => true, 'targetClass' => CinemaSalles::className(), 'targetAttribute' => ['salle_id' => 'idSalle']],
            [['ville_id'], 'exist', 'skipOnError' => true, 'targetClass' => Villes::className(), 'targetAttribute' => ['ville_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcinema_salle_villes' => 'Idcinema Salle Villes',
            'salle_id' => 'Salle ID',
            'ville_id' => 'Ville ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalle()
    {
        return $this->hasOne(CinemaSalles::className(), ['idSalle' => 'salle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVille()
    {
        return $this->hasOne(Villes::className(), ['id' => 'ville_id']);
    }
}
