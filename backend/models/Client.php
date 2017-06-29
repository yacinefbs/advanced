<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property integer $id_clt
 * @property string $nom
 * @property string $prenom
 *
 * @property Publication[] $publications
 */
class Client extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom', 'prenom'], 'required'],
            [['nom', 'prenom'], 'string', 'max' => 30],
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['nom', 'prenom']; //Scenario Values only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_clt' => 'Id Clt',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublications()
    {
        return $this->hasMany(Publication::className(), ['id_client' => 'id_clt']);
    }
}
