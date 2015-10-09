<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Integral;

/**
 * IntegralSearch represents the model behind the search form about `app\Models\Integral`.
 */
class IntegralSearch extends Integral
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Integral_value', 'total', 'ration', 'discount', 'usage'], 'integer'],
            [['user_name', 'start_time', 'end_time', 'Title', 'Titlezh', 'Titleyn', 'Content', 'Contentzh', 'Contentyn', 'img_url'], 'safe'],
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
        $query = Integral::find();

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
            'Integral_value' => $this->Integral_value,
            'total' => $this->total,
            'ration' => $this->ration,
            'discount' => $this->discount,
            'usage' => $this->usage,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Titlezh', $this->Titlezh])
            ->andFilterWhere(['like', 'Titleyn', $this->Titleyn])
            ->andFilterWhere(['like', 'Content', $this->Content])
            ->andFilterWhere(['like', 'Contentzh', $this->Contentzh])
            ->andFilterWhere(['like', 'Contentyn', $this->Contentyn])
            ->andFilterWhere(['like', 'img_url', $this->img_url]);

        return $dataProvider;
    }
}
