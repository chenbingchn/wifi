<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Account;

/**
 * AccountSearch represents the model behind the search form about `app\models\Account`.
 */
class AccountSearch extends Account {

    public $country_name;
    public $Email;
    public $first_date;
    public $city_name;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'age'], 'integer'],
            [['email', 'user_name', 'password', 'phone_number', 'avatar', 'imei', 'created_at', 'version', 'product_model', 'gender','last_active_time','country_name','Email','first_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Account::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' => '10',
            ]
        ]);
        $query->joinWith('score')->joinWith('information')->orderBy('counter desc');
        $this->load($params);

        $dataProvider->setSort([
            'attributes' => [
                /* 其它字段不要动 */
                /*  下面这段是加入的 */
                /*=============*/
                'country_name' => [
                    'asc' => ['imei_user_basic_info.country_name' => SORT_ASC],
                    'desc' => ['imei_user_basic_info.country_name' => SORT_DESC],
                    'label' => 'country_name'
                ],
                'Email' => [
                    'asc' => ['imei_user_basic_info.email' => SORT_ASC],
                    'desc' => ['imei_user_basic_info.email' => SORT_DESC],
                    'label' => 'country_name'
                ],
                'first_date' => [
                    'asc' => ['imei_user_basic_info.first_date' => SORT_ASC],
                    'desc' => ['imei_user_basic_info.first_date' => SORT_DESC],
                    'label' => 'first_date'
                ],
                'city_name' => [
                    'asc' => ['imei_user_basic_info.city_name' => SORT_ASC],
                    'desc' => ['imei_user_basic_info.city_name' => SORT_DESC],
                    'label' => 'city_name'
                ],
                /*=============*/
            ]
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
       if($this->gender=="男"){
            $this->gender=1;
        }elseif($this->gender=="女"){
            $this->gender=-1;
        }
        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'age' => $this->age,
//            'created_at' => $this->created_at,
            'gender' => $this->gender,
        ]);
        $query->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'imei_user_basic_info.email', $this->email])
                ->andFilterWhere(['like', 'user_name', $this->user_name])
                ->andFilterWhere(['like', 'password', $this->password])
                ->andFilterWhere(['like', 'phone_number', $this->phone_number])
                ->andFilterWhere(['like', 'avatar', $this->avatar])
                ->andFilterWhere(['like', 'account.imei', $this->imei])
                ->andFilterWhere(['like', 'version', $this->version])
                ->andFilterWhere(['like', 'gender', $this->gender])
                ->andFilterWhere(['like', 'product_model', $this->product_model])
                ->andFilterWhere(['like', 'imei_user_basic_info.country_name',$this->country_name])
                ->andFilterWhere(['like', 'imei_user_basic_info.first_date',$this->first_date])
                ->andFilterWhere(['like', 'imei_user_basic_info.city_name',$this->city_name])
                ->andFilterWhere(['like', 'created_at', $this->created_at])
                ->andFilterWhere(['like', 'last_active_time', $this->last_active_time]);

        return $dataProvider;
    }

}
