<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaEquipe;

/**
 * CinemaEquipeSearch represents the model behind the search form about `backend\models\CinemaEquipe`.
 */
class CinemaEquipeSearch extends CinemaEquipe
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['nom', 'nationalite', 'date_naissance', 'biographie', 'photo', 'slug'], 'safe'],
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
        $query = CinemaEquipe::find();

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
            'date_naissance' => $this->date_naissance,
        ]);

        $query->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'nationalite', $this->nationalite])
            ->andFilterWhere(['like', 'biographie', $this->biographie])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
