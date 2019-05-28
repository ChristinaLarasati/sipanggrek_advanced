<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ImunisasiAnak;

/**
 * ImunisasiAnakSearch represents the model behind the search form of `frontend\models\ImunisasiAnak`.
 */
class ImunisasiAnakSearch extends ImunisasiAnak
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imunisasi', 'nama_penerima', 'vaksin', 'tgl_pemberian', 'petugas'], 'safe'],
            [['usia'], 'integer'],
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
        $query = ImunisasiAnak::find();

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
            'usia' => $this->usia,
            'tgl_pemberian' => $this->tgl_pemberian,
        ]);

        $query->andFilterWhere(['like', 'id_imunisasi', $this->id_imunisasi])
            ->andFilterWhere(['like', 'nama_penerima', $this->nama_penerima])
            ->andFilterWhere(['like', 'vaksin', $this->vaksin])
            ->andFilterWhere(['like', 'petugas', $this->petugas]);

        return $dataProvider;
    }
}
