<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id_art
 * @property string $titre
 * @property string $contenu
 * @property string $date_art
 * @property integer $publie
 * @property string $file
 * @property integer $id_user
 *
 * @property ArtCat[] $artCats
 * @property User $idUser
 */
class Article extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titre', 'contenu', 'date_art', 'publie', 'file', 'id_user'], 'required'],
            [['contenu'], 'string'],
            [['date_art'], 'safe'],
            [['publie', 'id_user'], 'integer'],
            [['titre'], 'string', 'max' => 30],
            [['file'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['titre', 'contenu', 'date_art', 'publie', 'file', 'id_user']; //Scenario Values only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_art' => 'Id Art',
            'titre' => 'Titre',
            'contenu' => 'Contenu',
            'date_art' => 'Date Art',
            'publie' => 'Publie',
            'file' => 'File',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtCats()
    {
        return $this->hasMany(ArtCat::className(), ['id_art' => 'id_art']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
