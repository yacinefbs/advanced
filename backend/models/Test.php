<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property integer $id
 * @property string $nom
 * @property string $val
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nom', 'val'], 'required'],
            [['nom'], 'string', 'max' => 200],
            [['val'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'val' => 'Val',
        ];
    }
}
