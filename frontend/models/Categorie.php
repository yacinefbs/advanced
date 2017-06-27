<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categorie".
 *
 * @property integer $id_cat
 * @property string $categorie
 */
class Categorie extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categorie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categorie'], 'required'],
            [['categorie'], 'string', 'max' => 30],
        ];
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['categorie']; //Scenario Values only Accepted
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cat' => 'Id Cat',
            'categorie' => 'Categorie',
        ];
    }
}
