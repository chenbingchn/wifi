<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Integralrecord;
use app\models\Account;

/**
 * IntegralrecordSearch represents the model behind the search form about `app\Models\Integralrecord`.
 */
class IntegralrecordSearch extends Integralrecord
{
    /**
     * @inheritdoc
     */

    public $phone_number;

    public function rules()
    {
        return [
            [['id', 'user_id', 'integral_id', 'bargin_points', 'flag','phone_number'], 'integer'],
            [['buy_date', 'buy_time'], 'safe'],
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
        $query = Integralrecord::find()->joinWith('account');

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
            'phone_number' => $this->phone_number,
            'user_id' => $this->user_id,
            'integral_id' => $this->integral_id,
            'buy_date' => $this->buy_date,
            'buy_time' => $this->buy_time,
            'bargin_points' => $this->bargin_points,
            'flag' => $this->flag,
        ]);

        return $dataProvider;
    }

}
