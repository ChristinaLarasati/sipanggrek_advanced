<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\PerkembanganKesehatan;

/**
 * PerkembanganKesehatanSearch represents the model behind the search form of `frontend\models\PerkembanganKesehatan`.
 */
class PerkembanganKesehatanSearch extends PerkembanganKesehatan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_perkembangan', 'identitas_anggota', 'keluhan', 'tgl_pemeriksaan', 'pemeriksa'], 'safe'],
            [['lingkar_perut', 'berat_badan', 'tinggi_badan'], 'integer'],
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
        $query = PerkembanganKesehatan::find();

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
            'lingkar_perut' => $this->lingkar_perut,
            'berat_badan' => $this->berat_badan,
            'tinggi_badan' => $this->tinggi_badan,
            'tgl_pemeriksaan' => $this->tgl_pemeriksaan,
        ]);

        $query->andFilterWhere(['like', 'id_perkembangan', $this->id_perkembangan])
            ->andFilterWhere(['like', 'identitas_anggota', $this->identitas_anggota])
            ->andFilterWhere(['like', 'keluhan', $this->keluhan])
            ->andFilterWhere(['like', 'pemeriksa', $this->pemeriksa]);

        return $dataProvider;
    }
}
