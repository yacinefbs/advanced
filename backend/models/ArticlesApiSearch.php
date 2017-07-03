<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ArticlesApi;

/**
 * ArticlesApiSearch represents the model behind the search form about `backend\models\ArticlesApi`.
 */
class ArticlesApiSearch extends ArticlesApi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idContent', 'idOut', 'article_year', 'idParent', 'idRubrique', 'origine_id', 'ordre', 'ordreRub', 'exclusif', 'id_video', 'count_views', 'count_comment', 'count_fblike', 'count_fbshare'], 'integer'],
            [['surTitre', 'titre', 'sousTitre', 'resume', 'contenu', 'seo_titre', 'seo_desc', 'seo_mcles', 'texteBloc', 'image', 'imgcaption', 'auteur_id', 'source_id', 'is_comment', 'is_slider', 'statut', 'slug', 'is_galerie', 'is_video', 'is_audio', 'is_social', 'date_crea', 'date_modif', 'creepar_id', 'modifpar_id'], 'safe'],
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
        $query = ArticlesApi::find();

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
            'idContent' => $this->idContent,
            'idOut' => $this->idOut,
            'article_year' => $this->article_year,
            'idParent' => $this->idParent,
            'idRubrique' => $this->idRubrique,
            'origine_id' => $this->origine_id,
            'ordre' => $this->ordre,
            'ordreRub' => $this->ordreRub,
            'exclusif' => $this->exclusif,
            'id_video' => $this->id_video,
            'date_crea' => $this->date_crea,
            'date_modif' => $this->date_modif,
            'count_views' => $this->count_views,
            'count_comment' => $this->count_comment,
            'count_fblike' => $this->count_fblike,
            'count_fbshare' => $this->count_fbshare,
        ]);

        $query->andFilterWhere(['like', 'surTitre', $this->surTitre])
            ->andFilterWhere(['like', 'titre', $this->titre])
            ->andFilterWhere(['like', 'sousTitre', $this->sousTitre])
            ->andFilterWhere(['like', 'resume', $this->resume])
            ->andFilterWhere(['like', 'contenu', $this->contenu])
            ->andFilterWhere(['like', 'seo_titre', $this->seo_titre])
            ->andFilterWhere(['like', 'seo_desc', $this->seo_desc])
            ->andFilterWhere(['like', 'seo_mcles', $this->seo_mcles])
            ->andFilterWhere(['like', 'texteBloc', $this->texteBloc])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'imgcaption', $this->imgcaption])
            ->andFilterWhere(['like', 'auteur_id', $this->auteur_id])
            ->andFilterWhere(['like', 'source_id', $this->source_id])
            ->andFilterWhere(['like', 'is_comment', $this->is_comment])
            ->andFilterWhere(['like', 'is_slider', $this->is_slider])
            ->andFilterWhere(['like', 'statut', $this->statut])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'is_galerie', $this->is_galerie])
            ->andFilterWhere(['like', 'is_video', $this->is_video])
            ->andFilterWhere(['like', 'is_audio', $this->is_audio])
            ->andFilterWhere(['like', 'is_social', $this->is_social])
            ->andFilterWhere(['like', 'creepar_id', $this->creepar_id])
            ->andFilterWhere(['like', 'modifpar_id', $this->modifpar_id]);

        return $dataProvider;
    }
}
