<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Wifieventdetail;

/**
 * WifieventdetailSearch represents the model behind the search form about `app\models\Wifieventdetail`.
 */
class WifieventdetailSearch extends Wifieventdetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'wifi_type', 'connect_event', 'level', 'connect_way', 'connector_uid'], 'integer'],
            [['bssid', 'connector_imei', 'connect_date'], 'safe'],
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
    public function search($params,$bssid,$time)
    {
        $query = Wifieventdetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        $level = '-'.$this->level;
        if($level == '-'){
            $level = $this->level;
        }else{
            $level = (int) $level;
        }
        $start = strtotime($time);
        $end = $start+86400;
        $end = date('Y-m-d', $end);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'wifi_type' => $this->wifi_type,
            'connect_event' => $this->connect_event,
            'level' => $level,
            'connect_way' => $this->connect_way,
            'connector_uid' => $this->connector_uid,
        ]);

        $query->andFilterWhere(['like', 'bssid', $bssid])
            ->andFilterWhere(['<','connect_date',$end])
            ->andFilterWhere(['>','connect_date',$time])
            ->andFilterWhere(['like', 'connector_imei', $this->connector_imei]);
        return $dataProvider;
    }
}
