<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Package;

/**
 * PackageSearch represents the model behind the search form of `app\models\Package`.
 */
class PackageSearch extends Package
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pk_id', 'sys_id'], 'integer'],
            [['pk_name', 'pk_detail', 'pk_number'], 'safe'],
            [['pk_value'], 'number'],
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
        $query = Package::find();

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
            'pk_id' => $this->pk_id,
            'pk_value' => $this->pk_value,
            'sys_id' => $this->sys_id,
        ]);

        $query->andFilterWhere(['like', 'pk_name', $this->pk_name])
            ->andFilterWhere(['like', 'pk_detail', $this->pk_detail])
            ->andFilterWhere(['like', 'pk_number', $this->pk_number]);

        return $dataProvider;
    }
}
