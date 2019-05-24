<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PetugasPosyandu;

/**
 * PetugasPosyanduSearch represents the model behind the search form of `frontend\models\PetugasPosyandu`.
 */
class PetugasPosyanduSearch extends PetugasPosyandu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik_petugas', 'nama_petugas', 'peran_petugas', 'no_hp_petugas', 'foto_petugas', 'tgl_daftar'], 'safe'],
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
        $query = PetugasPosyandu::find();

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
            'tgl_daftar' => $this->tgl_daftar,
        ]);

        $query->andFilterWhere(['like', 'nik_petugas', $this->nik_petugas])
            ->andFilterWhere(['like', 'nama_petugas', $this->nama_petugas])
            ->andFilterWhere(['like', 'peran_petugas', $this->peran_petugas])
            ->andFilterWhere(['like', 'no_hp_petugas', $this->no_hp_petugas]);

        return $dataProvider;
    }
}
