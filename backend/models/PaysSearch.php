<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pays;

/**
 * PaysSearch represents the model behind the search form about `backend\models\Pays`.
 */
class PaysSearch extends Pays
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'publier', 'flag'], 'integer'],
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
        $query = Pays::find();

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
            'flag' => $this->flag,
        ]);

        $query->andFilterWhere(['like', 'nom_fr', $this->nom_fr])
            ->andFilterWhere(['like', 'nom_ar', $this->nom_ar])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
