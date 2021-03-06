<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Raiders;

/**
 * RaidersSearch represents the model behind the search form about `app\Models\Raiders`.
 */
class RaidersSearch extends Raiders
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'titlezh', 'titleyn', 'content', 'contentzh', 'contentyn'], 'safe'],
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
        $query = Raiders::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'titlezh', $this->titlezh])
            ->andFilterWhere(['like', 'titleyn', $this->titleyn])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'contentzh', $this->contentzh])
            ->andFilterWhere(['like', 'contentyn', $this->contentyn]);

        return $dataProvider;
    }
}
