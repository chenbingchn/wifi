<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShareWifi;

/**
 * ShareWifiSearch represents the model behind the search form about `app\Models\ShareWifi`.
 */
class ShareWifiSearch extends ShareWifi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'max_value', 'min_value'], 'integer'],
            [['title', 'titlezh', 'titleyn', 'pic_url'], 'safe'],
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
        $query = ShareWifi::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'max_value' => $this->max_value,
            'min_value' => $this->min_value,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titlezh', $this->titlezh])
            ->andFilterWhere(['like', 'titleyn', $this->titleyn])
            ->andFilterWhere(['like', 'pic_url', $this->pic_url]);

        return $dataProvider;
    }
}
