<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AwardType;

/**
 * AwardtypeSearch represents the model behind the search form about `app\models\AwardType`.
 */
class AwardtypeSearch extends AwardType
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['award_type'], 'integer'],
            [['award_type_en', 'award_type_id', 'award_type_zh'], 'safe'],
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
        $query = AwardType::find();

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
            'award_type' => $this->award_type,
        ]);

        $query->andFilterWhere(['like', 'award_type_en', $this->award_type_en])
            ->andFilterWhere(['like', 'award_type_id', $this->award_type_id])
            ->andFilterWhere(['like', 'award_type_zh', $this->award_type_zh]);

        return $dataProvider;
    }
}
