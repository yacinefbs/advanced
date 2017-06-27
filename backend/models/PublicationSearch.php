<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Publication;

/**
 * PublicationSearch represents the model behind the search form about `backend\models\Publication`.
 */
class PublicationSearch extends Publication
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pub', 'id_client', 'id_user'], 'integer'],
            [['titre', 'description', 'contenu', 'date_pub', 'image'], 'safe'],
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

        // grid filtering conditions
        $query->andFilterWhere([
            'id_pub' => $this->id_pub,
            'date_pub' => $this->date_pub,
            'id_client' => $this->id_client,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'titre', $this->titre])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'contenu', $this->contenu])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
