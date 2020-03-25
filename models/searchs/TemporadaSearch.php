<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Temporada;

/**
 * TemporadaSearch represents the model behind the search form of `app\models\Temporada`.
 */
class TemporadaSearch extends Temporada
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tem_id', 'tem_activa'], 'integer'],
            [['tem_inicio', 'tem_final', 'tem_create_at', 'tem_update_at'], 'safe'],
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
        $query = Temporada::find();

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
            'tem_id' => $this->tem_id,
            'tem_inicio' => $this->tem_inicio,
            'tem_final' => $this->tem_final,
            'tem_activa' => $this->tem_activa,
            'tem_create_at' => $this->tem_create_at,
            'tem_update_at' => $this->tem_update_at,
        ]);

        return $dataProvider;
    }
}
