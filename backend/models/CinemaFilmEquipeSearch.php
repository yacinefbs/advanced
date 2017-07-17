<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaFilmEquipe;

/**
 * CinemaFilmEquipeSearch represents the model behind the search form about `backend\models\CinemaFilmEquipe`.
 */
class CinemaFilmEquipeSearch extends CinemaFilmEquipe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'film_id', 'metier_id', 'equipe_id'], 'integer'],
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
        $query = CinemaFilmEquipe::find();

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
            'metier_id' => $this->metier_id,
            'equipe_id' => $this->equipe_id,
        ]);

        return $dataProvider;
    }
}
