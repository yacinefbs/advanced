<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ArtCat;

/**
 * ArtCatSearch represents the model behind the search form about `backend\models\ArtCat`.
 */
class ArtCatSearch extends ArtCat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_art', 'id_cat'], 'integer'],
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
        $query = ArtCat::find();

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
            'id_art' => $this->id_art,
            'id_cat' => $this->id_cat,
        ]);

        return $dataProvider;
    }
}
