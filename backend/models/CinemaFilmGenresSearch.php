<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaFilmGenres;

/**
 * CinemaFilmGenresSearch represents the model behind the search form about `backend\models\CinemaFilmGenres`.
 */
class CinemaFilmGenresSearch extends CinemaFilmGenres
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'film_id', 'genre_id'], 'integer'],
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
        $query = CinemaFilmGenres::find();

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
            'film_id' => $this->film_id,
            'genre_id' => $this->genre_id,
        ]);

        return $dataProvider;
    }
}
