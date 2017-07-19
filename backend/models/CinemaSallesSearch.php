<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaSalles;

/**
 * CinemaSallesSearch represents the model behind the search form about `backend\models\CinemaSalles`.
 */
class CinemaSallesSearch extends CinemaSalles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSalle', 'cree_par', 'modifie_par'], 'integer'],
            [['libellefr', 'libellear', 'seance_fr', 'seance_ar', 'slug', 'adresse', 'longitude', 'latitude', 'logo', 'photo', 'publier', 'date_crea', 'date_modif'], 'safe'],
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
        $query = CinemaSalles::find();

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
            'idSalle' => $this->idSalle,
            // 'idville' => $this->idville,
            'cree_par' => $this->cree_par,
            'date_crea' => $this->date_crea,
            'modifie_par' => $this->modifie_par,
            'date_modif' => $this->date_modif,
        ]);

        $query->andFilterWhere(['like', 'libellefr', $this->libellefr])
            ->andFilterWhere(['like', 'libellear', $this->libellear])
            ->andFilterWhere(['like', 'seance_fr', $this->seance_fr])
            ->andFilterWhere(['like', 'seance_ar', $this->seance_ar])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'longitude', $this->longitude])
            ->andFilterWhere(['like', 'latitude', $this->latitude])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'publier', $this->publier]);

        return $dataProvider;
    }
}
