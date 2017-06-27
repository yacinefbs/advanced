<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "evenement".
 *
 * @property integer $id_eve
 * @property string $description
 * @property string $date_eve
 * @property string $contenu
 * @property integer $id_user
 *
 * @property User $idUser
 */
class Evenement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evenement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'date_eve', 'contenu', 'id_user'], 'required'],
            [['description', 'contenu'], 'string'],
            [['date_eve'], 'safe'],
            [['id_user'], 'integer'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_eve' => 'Id Evenement',
            'description' => 'Description',
            'date_eve' => 'Date Evenement',
            'contenu' => 'Contenu',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
