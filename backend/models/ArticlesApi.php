<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "articles_api".
 *
 * @property string $idContent
 * @property string $idOut
 * @property integer $article_year
 * @property integer $idParent
 * @property integer $idRubrique
 * @property integer $origine_id
 * @property integer $ordre
 * @property integer $ordreRub
 * @property string $surTitre
 * @property string $titre
 * @property string $sousTitre
 * @property string $resume
 * @property string $contenu
 * @property string $seo_titre
 * @property string $seo_desc
 * @property string $seo_mcles
 * @property string $texteBloc
 * @property string $image
 * @property string $imgcaption
 * @property string $auteur_id
 * @property string $source_id
 * @property integer $exclusif
 * @property string $is_comment
 * @property string $is_slider
 * @property string $statut
 * @property string $slug
 * @property string $is_galerie
 * @property string $is_video
 * @property string $is_audio
 * @property string $is_social
 * @property integer $id_video
 * @property string $date_crea
 * @property string $date_modif
 * @property string $creepar_id
 * @property string $modifpar_id
 * @property string $count_views
 * @property string $count_comment
 * @property string $count_fblike
 * @property string $count_fbshare
 */
class ArticlesApi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles_api';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idOut', 'article_year', 'idParent', 'idRubrique', 'origine_id', 'ordre', 'ordreRub', 'exclusif', 'id_video', 'count_views', 'count_comment', 'count_fblike', 'count_fbshare'], 'integer'],
            [['titre', 'sousTitre', 'resume', 'contenu', 'seo_titre', 'seo_desc', 'seo_mcles', 'texteBloc', 'is_comment', 'is_slider', 'statut', 'slug', 'is_galerie', 'is_video', 'is_audio', 'is_social'], 'string'],
            [['date_crea', 'date_modif'], 'safe'],
            [['surTitre'], 'string', 'max' => 128],
            [['image', 'imgcaption'], 'string', 'max' => 250],
            [['auteur_id', 'source_id', 'creepar_id', 'modifpar_id'], 'string', 'max' => 200],
            [['titre','idRubrique', 'statut', 'is_comment', 'is_slider', 'is_galerie', 'is_video', 'is_audio', 'is_social', ], 'required'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idContent' => 'Id Content',
            'idOut' => 'Id Out',
            'article_year' => 'Article Year',
            'idParent' => 'Id Parent',
            'idRubrique' => 'Id Rubrique',
            'origine_id' => 'Origine ID',
            'ordre' => 'Ordre',
            'ordreRub' => 'Ordre Rub',
            'surTitre' => 'Sur Titre',
            'titre' => 'Titre',
            'sousTitre' => 'Sous Titre',
            'resume' => 'Resume',
            'contenu' => 'Contenu',
            'seo_titre' => 'Seo Titre',
            'seo_desc' => 'Seo Desc',
            'seo_mcles' => 'Seo Mcles',
            'texteBloc' => 'Texte Bloc',
            'image' => 'Image',
            'imgcaption' => 'Imgcaption',
            'auteur_id' => 'Auteur ID',
            'source_id' => 'Source ID',
            'exclusif' => 'Exclusif',
            'is_comment' => 'Is Comment',
            'is_slider' => 'Is Slider',
            'statut' => 'Statut',
            'slug' => 'Slug',
            'is_galerie' => 'Is Galerie',
            'is_video' => 'Is Video',
            'is_audio' => 'Is Audio',
            'is_social' => 'Is Social',
            'id_video' => 'Id Video',
            'date_crea' => 'Date Crea',
            'date_modif' => 'Date Modif',
            'creepar_id' => 'Creepar ID',
            'modifpar_id' => 'Modifpar ID',
            'count_views' => 'Count Views',
            'count_comment' => 'Count Comment',
            'count_fblike' => 'Count Fblike',
            'count_fbshare' => 'Count Fbshare',
        ];
    }
}
