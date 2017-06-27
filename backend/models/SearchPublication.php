<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Publication;
use backend\models\Client;
/**
 * SearchPublication represents the model behind the search form about `backend\models\Publication`.
 */
class SearchPublication extends Publication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pub', 'id_user'], 'integer'],
            [['titre','id_client', 'description', 'contenu', 'date_pub', 'file'], 'safe'],
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
        $query = Publication::find();

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
        $query->joinWith('client');
        // grid filtering conditions
        $query->andFilterWhere([
            'id_pub' => $this->id_pub,
            'date_pub' => $this->date_pub,
            
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'titre', $this->titre])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contenu', $this->contenu])
            ->andFilterWhere(['like', 'nom', $this->id_client]);

        return $dataProvider;
    }
}
