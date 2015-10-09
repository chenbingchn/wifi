<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imeiuserbasicinfo;

/**
 * ImeiuserbasicinfoSearch represents the model behind the search form about `app\models\Imeiuserbasicinfo`.
 */
class ImeiuserbasicinfoSearch extends Imeiuserbasicinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['imei', 'country_name', 'first_date', 'email', 'city_name'], 'safe'],
            [['country_id', 'channel_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
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
        $query = Imeiuserbasicinfo::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'country_id' => $this->country_id,
            'first_date' => $this->first_date,
            'channel_id' => $this->channel_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $query->andFilterWhere(['like', 'imei', $this->imei])
            ->andFilterWhere(['like', 'country_name', $this->country_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'city_name', $this->city_name]);

        return $dataProvider;
    }
}
