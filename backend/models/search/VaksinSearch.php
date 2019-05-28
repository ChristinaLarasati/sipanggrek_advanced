<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Vaksin;

/**
 * VaksinSearch represents the model behind the search form of `backend\models\Vaksin`.
 */
class VaksinSearch extends Vaksin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_vaksin', 'nama_vaksin'], 'safe'],
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
        $query = Vaksin::find();

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
        $query->andFilterWhere(['like', 'id_vaksin', $this->id_vaksin])
            ->andFilterWhere(['like', 'nama_vaksin', $this->nama_vaksin]);

        return $dataProvider;
    }
}
