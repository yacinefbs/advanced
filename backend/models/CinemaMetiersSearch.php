<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaMetiers;

/**
 * CinemaMetiersSearch represents the model behind the search form about `backend\models\CinemaMetiers`.
 */
class CinemaMetiersSearch extends CinemaMetiers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['metier_ar', 'metier_fr'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CinemaMetiers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'metier_ar', $this->metier_ar])
            ->andFilterWhere(['like', 'metier_fr', $this->metier_fr]);

        return $dataProvider;
    }
}
