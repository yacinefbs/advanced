<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "publication".
 *
 * @property integer $id_pub
 * @property string $titre
 * @property string $description
 * @property string $contenu
 * @property string $date_pub
 * @property string $file
 * @property integer $id_client
 * @property integer $id_user
 *
 * @property Client $idClient
 * @property User $idUser
 */
class Publication extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publication';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titre', 'description', 'contenu', 'date_pub', 'file', 'id_client', 'id_user'], 'required'],
            [['description', 'contenu', 'file'], 'string'],
            [['date_pub'], 'safe'],
            [['id_client', 'id_user'], 'integer'],
            [['titre'], 'string', 'max' => 255],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => Client::className(), 'targetAttribute' => ['id_client' => 'id_clt']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }


    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create'] = 
            ['titre', 'description', 'contenu', 'date_pub', 'file', 'id_user', 'id_client']; //Scenario Values only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pub' => 'Id Pub',
            'titre' => 'Titre',
            'description' => 'Description',
            'contenu' => 'Contenu',
            'date_pub' => 'Date Pub',
            'file' => 'File',
            'id_client' => 'Id Client',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient()
    {
        return $this->hasOne(Client::className(), ['id_clt' => 'id_client']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
