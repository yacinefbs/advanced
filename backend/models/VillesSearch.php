<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Villes;

/**
 * VillesSearch represents the model behind the search form about `backend\models\Villes`.
 */
class VillesSearch extends Villes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'publier', 'flag_meteo', 'pays_id'], 'integer'],
            [['nom_fr', 'nom_ar', 'slug'], 'safe'],
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
        $query = Villes::find();

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
            'id' => $this->id,
            'publier' => $this->publier,
            'flag_meteo' => $this->flag_meteo,
            'pays_id' => $this->pays_id,
        ]);

        $query->andFilterWhere(['like', 'nom_fr', $this->nom_fr])
            ->andFilterWhere(['like', 'nom_ar', $this->nom_ar])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
