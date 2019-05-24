<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\AnggotaPosyandu;

/**
 * AnggotaPosyanduSearch represents the model behind the search form of `frontend\models\AnggotaPosyandu`.
 */
class AnggotaPosyanduSearch extends AnggotaPosyandu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nik', 'nama_anggota', 'peran', 'tempat_lahir', 'tgl_lahir', 'gender', 'alamat', 'nama_ayah', 'nama_ibu', 'nama_suami', 'pekerjaan', 'no_hp', 'no_hp_orangtua', 'foto_anggota', 'tgl_pendaftaran'], 'safe'],
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
        $query = AnggotaPosyandu::find();

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
            'tgl_lahir' => $this->tgl_lahir,
            'tgl_pendaftaran' => $this->tgl_pendaftaran,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama_anggota', $this->nama_anggota])
            ->andFilterWhere(['like', 'peran', $this->peran])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nama_ayah', $this->nama_ayah])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'nama_suami', $this->nama_suami])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'no_hp_orangtua', $this->no_hp_orangtua])
            ->andFilterWhere(['like', 'foto_anggota', $this->foto_anggota]);

        return $dataProvider;
    }
}
