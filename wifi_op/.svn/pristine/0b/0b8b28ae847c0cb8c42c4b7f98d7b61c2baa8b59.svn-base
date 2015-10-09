<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Opstandarddata;

/**
 * OpstandarddataSearch represents the model behind the search form about `app\Models\Opstandarddata`.
 */
class OpstandarddataSearch extends Opstandarddata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'dataid', 'pay','type','history_id'], 'integer'],
            [['auto_type'], 'safe'],
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
        $query = Opstandarddata::find();

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
            'user_id' => $this->user_id,
            'dataid' => $this->dataid,
            'type' => $this->type,
            'pay' => $this->pay,
            'history_id' => $this->history_id,
        ])->orderBy('id desc');

        $query->andFilterWhere(['like', 'auto_type', $this->auto_type]);

        return $dataProvider;
    }
}
