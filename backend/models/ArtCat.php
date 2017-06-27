<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "art_cat".
 *
 * @property integer $id_art
 * @property integer $id_cat
 *
 * @property Article $idArt
 * @property Categorie $categorie
 */
class ArtCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'art_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_art', 'id_cat'], 'required'],
            [['id_art', 'id_cat'], 'integer'],
            [['id_art'], 'exist', 'skipOnError' => true, 'targetClass' => Article::className(), 'targetAttribute' => ['id_art' => 'id_art']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_art' => 'Id Art',
            'id_cat' => 'Id Cat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArt()
    {
        return $this->hasOne(Article::className(), ['id_art' => 'id_art']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategorie()
    {
        return $this->hasOne(Categorie::className(), ['id_cat' => 'id_cat']);
    }
}
