<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Evenement;

/**
 * EvenementSearch represents the model behind the search form about `backend\models\Evenement`.
 */
class EvenementSearch extends Evenement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_eve', 'id_user'], 'integer'],
            [['description', 'date_eve', 'contenu'], 'safe'],
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
        $query = Evenement::find();

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
            'id_eve' => $this->id_eve,
            'date_eve' => $this->date_eve,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contenu', $this->contenu]);

        return $dataProvider;
    }
}
