<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeritaPosyandu;

/**
 * BeritaPosyanduSearch represents the model behind the search form of `backend\models\BeritaPosyandu`.
 */
class BeritaPosyanduSearch extends BeritaPosyandu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berita', 'judul', 'isi_berita', 'tgl_unggah'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = BeritaPosyandu::find();

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
            'tgl_unggah' => $this->tgl_unggah,
        ]);

        $query->andFilterWhere(['like', 'id_berita', $this->id_berita])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isi_berita', $this->isi_berita]);

        return $dataProvider;
    }
}
