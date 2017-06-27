<?php

namespace frontend\models;

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
    const SCENARIO_CREATE = 'create';
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

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['description', 'date_eve', 'contenu']; //Scenario Values only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_eve' => 'Id Eve',
            'description' => 'Description',
            'date_eve' => 'Date Eve',
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
