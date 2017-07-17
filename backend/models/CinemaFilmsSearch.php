<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CinemaFilms;

/**
 * CinemaFilmsSearch represents the model behind the search form about `backend\models\CinemaFilms`.
 */
class CinemaFilmsSearch extends CinemaFilms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idfilm', 'rating', 'iduser_modif', 'user_id'], 'integer'],
            [['libelle_fr', 'libelle_ar', 'description_fr', 'description_ar', 'path_photo', 'duree', 'realisateur', 'acteur', 'bandAnnonce', 'date_sortie', 'statut', 'slug', 'date_crea', 'date_modif'], 'safe'],
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
        $query = CinemaFilms::find();

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
            'idfilm' => $this->idfilm,
            'date_sortie' => $this->date_sortie,
            'rating' => $this->rating,
            'date_crea' => $this->date_crea,
            'iduser_modif' => $this->iduser_modif,
            'date_modif' => $this->date_modif,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'libelle_fr', $this->libelle_fr])
            ->andFilterWhere(['like', 'libelle_ar', $this->libelle_ar])
            ->andFilterWhere(['like', 'description_fr', $this->description_fr])
            ->andFilterWhere(['like', 'description_ar', $this->description_ar])
            ->andFilterWhere(['like', 'path_photo', $this->path_photo])
            ->andFilterWhere(['like', 'duree', $this->duree])
            ->andFilterWhere(['like', 'realisateur', $this->realisateur])
            ->andFilterWhere(['like', 'acteur', $this->acteur])
            ->andFilterWhere(['like', 'bandAnnonce', $this->bandAnnonce])
            ->andFilterWhere(['like', 'statut', $this->statut])
            ->andFilterWhere(['like', 'slug', $this->slug]);

        return $dataProvider;
    }
}
