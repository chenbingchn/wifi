<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Account;

/**
 * AccountSearch represents the model behind the search form about `app\models\Account`.
 */
class AccountSearch extends Account
{

    public $counter;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'age', 'gender', 'third_type', 'master_uid','counter'], 'integer'],
            [['email', 'user_name', 'password', 'phone_number', 'avatar', 'imei', 'created_at', 'version', 'product_model', 'last_active_time', 'third_uid', 'third_token'], 'safe'],
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
        $query = Account::find()->joinWith('score');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [
                /*=============*/
                'counter' => [
                    'asc' => ['userid_score.counter' => SORT_ASC],
                    'desc' => ['userid_score.counter' => SORT_DESC],
                    'label' => 'counter'
                ],
                'created_at' => [
                    'asc' => ['account.created_at' => SORT_ASC],
                    'desc' => ['account.created_at' => SORT_DESC],
                    'label' => 'created_at'
                ],
                /*=============*/
            ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'age' => $this->age,
            'third_type' => $this->third_type,
            'master_uid' => 0,
            'gender' => $this->gender,
            'userid_score.counter' => $this->counter,
        ]);

        $query->andFilterWhere(['like', 'user_name', $this->user_name])
            ->andFilterWhere(['=', 'third_type', $this->third_type])
            ->andFilterWhere(['=', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['=', 'imei', $this->imei]);

        return $dataProvider;
    }
}
